<?php
include_once './config/db.php';
include_once './models/PowerSupply.php';

class PsuController
{
    private $psuModel;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id'])) header("Location: index.php?page=login");

        $database = new Database();
        $this->psuModel = new PowerSupply($database->getConnection());
    }

    public function index()
    {
        $filters = [
            'marca' => $_GET['marca'] ?? '',
            'output_details' => $_GET['output_details'] ?? '',
            'min_amp_out' => $_GET['min_amp_out'] ?? ''
        ];

        $orderBy = $_GET['order_by'] ?? 'marca';
        $orderDir = $_GET['order_dir'] ?? 'ASC';

        $stmt = $this->psuModel->search($filters, $orderBy, $orderDir);
        $alimentatori = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include './views/psu/list.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                ':marca' => $_POST['marca'],
                ':modello' => $_POST['modello'],
                ':imin' => $_POST['input_min'],
                ':imax' => $_POST['input_max'],
                ':ain' => $_POST['ampere_input'],
                ':aout' => $_POST['ampere_output'],
                ':fmin' => $_POST['freq_min'],
                ':fmax' => $_POST['freq_max'],
                ':outdet' => $_POST['output'],
                ':made' => $_POST['made_in'],
                ':note' => $_POST['note'] ?? null
            ];
            $this->psuModel->create($data);
            header("Location: index.php?page=home");
        }
        include './views/psu/add_psu.php';
    }

    public function delete($id)
    {
        $this->psuModel->delete($id);
        header("Location: index.php?page=home");
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                ':marca' => $_POST['marca'],
                ':modello' => $_POST['modello'],
                ':imin' => $_POST['input_min'],
                ':imax' => $_POST['input_max'],
                ':ain' => $_POST['ampere_input'],
                ':aout' => $_POST['ampere_output'],
                ':fmin' => $_POST['freq_min'],
                ':fmax' => $_POST['freq_max'],
                ':outdet' => $_POST['output'],
                ':made' => $_POST['made_in'],
                ':note' => $_POST['note'] ?? null
            ];

            $this->psuModel->edit($id, $data);
            header("Location: index.php?page=home");
        } else {
            $alimentatore = $this->psuModel->getById($id);
            include './views/psu/edit_psu.php';
        }
    }

    public function details($id)
    {
        $alimentatore = $this->psuModel->getById($id);
        if (!$alimentatore) {
            $error = 'Alimentatore non trovato';
        }
        include './views/psu/item_details.php';
    }
}
