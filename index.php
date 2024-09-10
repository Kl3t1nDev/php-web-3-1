<?php
require_once 'controllers/ClienteController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controller = new ClienteController();

switch ($action) {
    case 'create':
        $controller->create();
        include 'views/create.php';
        break;

    case 'edit':
        $cliente = $controller->edit($id);
        include 'views/edit.php';
        break;

    case 'delete':
        $controller->delete($id);
        break;

    default:
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $clientes = $controller->read();
        if ($search) {
            $clientes = array_filter($clientes, function($cliente) use ($search) {
                return stripos($cliente['Nome'], $search) !== false;
            });
        }
        include 'views/index.php';
        break;
}
?>
