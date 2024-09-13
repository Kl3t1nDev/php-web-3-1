<?php
class OrcamentoController {
    private $db;
    private $orcamentoModel;

    public function __construct($db) {
        $this->db = $db;
        $this->orcamentoModel = new Orcamento($db);
    }

    public function index($cliente_id = null) {
        if ($cliente_id) {
            $query = "SELECT o.*, c.Nome as cliente_nome
                      FROM orcamentos o
                      LEFT JOIN clientes c ON o.cliente_id = c.ID
                      WHERE o.cliente_id = :cliente_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':cliente_id', $cliente_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $this->orcamentoModel->readAll();
        }
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->orcamentoModel->cliente_id = $_POST['cliente_id'];
            $this->orcamentoModel->kwp = $_POST['kwp'];
            $this->orcamentoModel->orientacao = $_POST['orientacao'];
            $this->orcamentoModel->instalacao = $_POST['instalacao'];
            $this->orcamentoModel->preco = $_POST['preco'];

            if ($this->orcamentoModel->create()) {
                header('Location: index.php?entity=orcamento');
                exit();
            } else {
                echo 'Erro ao criar orçamento.';
            }
        }
    }

    public function edit($id) {
        // Implementar lógica para editar um orçamento
    }

    public function delete($id) {
        // Implementar lógica para deletar um orçamento
    }
}
?>
