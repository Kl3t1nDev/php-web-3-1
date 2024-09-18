<?php
require_once 'models/Cliente.php';

class ClienteController {
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cliente = new Cliente();
            $cliente->nome = $_POST['nome'];
            $cliente->cpf = $_POST['cpf'];
            $cliente->dataNascimento = $_POST['dataNascimento'];

            if ($cliente->create()) {
                header("Location: index.php?entity=cliente"); // Redireciona para o índice de clientes
                exit();
            } else {
                echo "Erro ao criar cliente!";
            }
        }
    }

    public function read() {
        $cliente = new Cliente();
        return $cliente->readAll();
    }

    public function edit($id) {
        $cliente = new Cliente();
        $cliente->id = $id;
        $cliente->readOne();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cliente->nome = $_POST['nome'];
            $cliente->cpf = $_POST['cpf'];
            $cliente->dataNascimento = $_POST['dataNascimento'];

            if ($cliente->update()) {
                header("Location: index.php?entity=cliente"); // Redireciona para o índice de clientes
                exit();
            } else {
                echo "Erro ao atualizar cliente!";
            }
        }

        return $cliente;
    }

    public function delete($id) {
        $cliente = new Cliente();
        $cliente->id = $id;

        if ($cliente->delete()) {
            header("Location: index.php?entity=cliente"); // Redireciona para o índice de clientes
            exit();
        } else {
            echo "Erro ao excluir cliente!";
        }
    }
}
?>
