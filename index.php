<?php
require_once 'controllers/ClienteController.php';
require_once 'controllers/OrcamentoController.php';
require_once 'config/database.php';

// Instanciar os controladores
$database = new Database();
$db = $database->getConnection();
$clienteController = new ClienteController($db);
$orcamentoController = new OrcamentoController($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$entity = isset($_GET['entity']) ? $_GET['entity'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$cliente_id = isset($_GET['cliente_id']) ? $_GET['cliente_id'] : null;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Clientes e Orçamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">Gerenciador</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?entity=cliente">Gerenciar Clientes</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <?php
            switch ($entity) {
                case 'cliente':
                    switch ($action) {
                        case 'create':
                            $clienteController->create();
                            include 'views/cliente/create.php';
                            break;

                        case 'edit':
                            $cliente = $clienteController->edit($id);
                            include 'views/cliente/edit.php';
                            break;

                        case 'delete':
                            $clienteController->delete($id);
                            header('Location: index.php?entity=cliente');
                            exit();
                            break;

                        default:
                            $search = isset($_GET['search']) ? $_GET['search'] : '';
                            $clientes = $clienteController->read();
                            if ($search) {
                                $clientes = array_filter($clientes, function($cliente) use ($search) {
                                    return stripos($cliente['Nome'], $search) !== false;
                                });
                            }
                            include 'views/cliente/index.php';
                            break;
                    }
                    break;

                case 'orcamento':
                    switch ($action) {
                        case 'create':
                            $orcamentoController->create();
                            include 'views/orcamento/create.php';
                            break;

                        case 'edit':
                            $orcamento = $orcamentoController->edit($id);
                            include 'views/orcamento/edit.php';
                            break;

                        case 'delete':
                            $orcamentoController->delete($id);
                            header('Location: index.php?entity=orcamento&cliente_id=' . $cliente_id);
                            exit();
                            break;

                        default:
                            if ($cliente_id) {
                                $orcamentos = $orcamentoController->index($cliente_id);
                                include 'views/orcamento/index.php';
                            } else {
                                echo '<div class="alert alert-warning" role="alert">Cliente não especificado para listar os orçamentos.</div>';
                            }
                            break;
                    }
                    break;

                default:
                    echo '<div class="jumbotron">';
                    echo '<h1 class="display-4">Bem-vindo!</h1>';
                    echo '<p class="lead">Escolha uma das opções abaixo para gerenciar clientes e orçamentos.</p>';
                    echo '<ul class="list-unstyled">';
                    echo '<li><a class="btn btn-primary btn-lg" href="index.php?entity=cliente" role="button">Gerenciar Clientes</a></li>';
                    echo '</ul>';
                    echo '</div>';
                    break;
            }
            ?>
        </main>
    </div>
</body>
</html>
