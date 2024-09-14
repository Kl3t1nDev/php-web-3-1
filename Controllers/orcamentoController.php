<?php
require_once 'models/Orcamento.php';

class OrcamentoController {
    
    // Função para criar um novo orçamento
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $orcamento = new Orcamento();
            $orcamento->cliente_id = $_POST['cliente_id'];
            $orcamento->kwp = $_POST['kwp'];
            $orcamento->orientacao = $_POST['orientacao'];
            $orcamento->instalacao = $_POST['instalacao'];
            $orcamento->preco = $_POST['preco'];

            if ($orcamento->create()) {
                // Redireciona para a lista de orçamentos do cliente
                header('Location: index.php?entity=orcamento&cliente_id=' . $_POST['cliente_id']);
                exit();
            } else {
                echo "Erro ao criar orçamento!";
            }
        }
    }

    // Função para listar os orçamentos
    public function read($cliente_id = null) {
        $orcamento = new Orcamento();
        return $orcamento->read($cliente_id); // Chama o método de leitura da model, com possibilidade de filtrar por cliente
    }

    // Função para editar um orçamento existente
    public function edit($id) {
        $orcamento = new Orcamento();
        $orcamento->id = $id;
        $orcamento->readOne();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $orcamento->kwp = $_POST['kwp'];
            $orcamento->orientacao = $_POST['orientacao'];
            $orcamento->instalacao = $_POST['instalacao'];
            $orcamento->preco = $_POST['preco'];

            if ($orcamento->update()) {
                // Redireciona para a lista de orçamentos do cliente
                header('Location: index.php?entity=orcamento&cliente_id=' . $_POST['cliente_id']);
                exit();
            } else {
                echo "Erro ao atualizar orçamento!";
            }
        }

        return $orcamento;
    }

    // Função para excluir um orçamento
    public function delete($id) {
        $orcamento = new Orcamento();
        $orcamento->id = $id;

        if ($orcamento->delete()) {
            // Redireciona para a lista de orçamentos
            header('Location: index.php?entity=orcamento');
            exit();
        } else {
            echo "Erro ao excluir orçamento!";
        }
    }
}
?>
