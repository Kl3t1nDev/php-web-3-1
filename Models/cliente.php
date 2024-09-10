<?php
require_once 'config/database.php';

class Cliente {
    private $connection;
    private $table = "cliente";

    public $id;
    public $nome;
    public $cpf;
    public $dataNascimento;

    public function __construct() {
        $this->connection = (new Database())->getConnection();
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (Nome, CPF, DataNascimento) VALUES (:nome, :cpf, :dataNascimento)";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':dataNascimento', $this->dataNascimento);

        return $stmt->execute();
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE ID = :id";

        $stmt = $this->connection->prepare($query);
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

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':dataNascimento', $this->dataNascimento);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE ID = :id";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }
}
?>
