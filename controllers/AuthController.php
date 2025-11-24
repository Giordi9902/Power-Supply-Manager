<?php
include_once './config/db.php';
include_once './models/User.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->userModel = new User($db);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->register($_POST['username'], $_POST['password'])) {
                header("Location: index.php?page=login&msg=registrato");
            }
        }
        include './views/auth/register.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $userId = $this->userModel->login($_POST['username'], $_POST['password']);
            if ($userId) {
                $_SESSION['user_id'] = $userId;
                header("Location: index.php?page=home");
                exit;
            } else {
                error_log('AuthController login FAIL email=' . $_POST['username'] . ' session_id=' . session_id());
                $error = "Credenziali errate";
            }
        }
        include './views/auth/login.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php?page=login");
    }
}
