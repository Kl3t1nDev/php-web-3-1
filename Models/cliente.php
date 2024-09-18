<?php
require_once 'config/database.php';

class Cliente {
    private $db;
    private $table = "clientes";

    public $id;
    public $nome;
    public $cpf;
    public $dataNascimento;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (Nome, CPF, DataNascimento) VALUES (:nome, :cpf, :dataNascimento)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':dataNascimento', $this->dataNascimento);

        return $stmt->execute();
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE ID = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $this->nome = $data['Nome'];
            $this->cpf = $data['CPF'];
            $this->dataNascimento = $data['DataNascimento'];
        }
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET Nome = :nome, CPF = :cpf, DataNascimento = :dataNascimento WHERE ID = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':dataNascimento', $this->dataNascimento);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE ID = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }
}
?>
