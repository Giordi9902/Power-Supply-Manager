<?php

class MvcController
{
    public function linkPagineController()
    {
        $page = $_GET['page'] ?? (isset($_SESSION['user_id']) ? 'home' : 'login');

        switch ($page) {
            case 'login':
                require_once './controllers/AuthController.php';
                $auth = new AuthController();
                $auth->login();
                break;
            case 'register':
                require_once './controllers/AuthController.php';
                $auth = new AuthController();
                $auth->register();
                break;
            case 'logout':
                require_once './controllers/AuthController.php';
                $auth = new AuthController();
                $auth->logout();
                break;
            case 'home':
                $this->ensureAuth();
                require_once './controllers/PsuController.php';
                $psu = new PsuController();
                $psu->index();
                break;
            case 'create':
                $this->ensureAuth();
                require_once './controllers/PsuController.php';
                $psu = new PsuController();
                $psu->create();
                break;
            case 'delete':
                $this->ensureAuth();
                $id = $_GET['id'] ?? null;
                if ($id) {
                    require_once './controllers/PsuController.php';
                    $psu = new PsuController();
                    $psu->delete($id);
                } else {
                    echo 'ID mancante';
                }
                break;
            case 'edit':
                $this->ensureAuth();
                $id = $_GET['id'] ?? null;
                if ($id) {
                    require_once './controllers/PsuController.php';
                    $psu = new PsuController();
                    $psu->edit($id);
                } else {
                    echo 'ID mancante';
                }
                break;
            case 'details':
                $this->ensureAuth();
                $id = $_GET['id'] ?? null;
                if ($id) {
                    require_once './controllers/PsuController.php';
                    $psu = new PsuController();
                    $psu->details($id);
                } else {
                    echo 'ID mancante';
                }
                break;
            default:
                echo 'Pagina non trovata';
        }
    }

    private function ensureAuth()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
    }
}
