<?php
require_once 'models/Orcamento.php';

class OrcamentoController {
    private $db;
    private $table = "orcamentos";

    public function __construct($db) {
        $this->db = $db;
    }

    public function index($cliente_id = null) {
        // Query para buscar orçamentos
        $query = "SELECT o.*, c.Nome as cliente_nome FROM " . $this->table . " o
                  LEFT JOIN clientes c ON o.cliente_id = c.ID";
        
        // Adiciona filtro para cliente_id se fornecido
        if ($cliente_id) {
            $query .= " WHERE o.cliente_id = :cliente_id";
        }

        $stmt = $this->db->prepare($query);
        if ($cliente_id) {
            $stmt->bindParam(':cliente_id', $cliente_id);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cliente_id = $_POST['cliente_id'];
            $kwp = $_POST['kwp'];
            $orientacao = $_POST['orientacao'];
            $instalacao = $_POST['instalacao'];
            $preco = $_POST['preco'];

            // Query para inserir um novo orçamento
            $query = "INSERT INTO " . $this->table . " (cliente_id, kwp, orientacao, instalacao, preco) VALUES (:cliente_id, :kwp, :orientacao, :instalacao, :preco)";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':cliente_id', $cliente_id);
            $stmt->bindParam(':kwp', $kwp);
            $stmt->bindParam(':orientacao', $orientacao);
            $stmt->bindParam(':instalacao', $instalacao);
            $stmt->bindParam(':preco', $preco);

            if ($stmt->execute()) {
                header('Location: index.php?entity=orcamento&cliente_id=' . $cliente_id);
                exit();
            } else {
                echo 'Erro ao criar orçamento.';
            }
        }
    }

    public function edit($id) {
        $orcamento = new Orcamento($this->db);
        $orcamento->id = $id;
        $stmt = $orcamento->readOne(); // Lê o orçamento específico para editar

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $orcamento->kwp = $_POST['kwp'];
            $orcamento->orientacao = $_POST['orientacao'];
            $orcamento->instalacao = $_POST['instalacao'];
            $orcamento->preco = $_POST['preco'];

            if ($orcamento->update()) {
                header('Location: index.php?entity=orcamento&cliente_id=' . $orcamento->cliente_id);
                exit();
            } else {
                echo 'Erro ao atualizar orçamento.';
            }
        }

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna os dados do orçamento para preencher o formulário
    }

    public function delete($id) {
        $orcamento = new Orcamento($this->db);
        $orcamento->id = $id;

        if ($orcamento->delete()) {
            header('Location: index.php?entity=orcamento');
            exit();
        } else {
            echo 'Erro ao excluir orçamento.';
        }
    }
}
?>
