<?php

class Orcamento {
    private $db;
    private $table = 'orcamentos';

    public $id;
    public $cliente_id;
    public $kwp;
    public $orientacao;
    public $instalacao;
    public $preco;

    public function __construct($db) {
        $this->db = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table . " WHERE cliente_id = :cliente_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':cliente_id', $this->cliente_id);
        $stmt->execute();
        return $stmt;
    }

    public function readAll() {
        $query = "SELECT o.*, c.Nome as cliente_nome
                  FROM " . $this->table . " o
                  LEFT JOIN clientes c ON o.cliente_id = c.ID";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (cliente_id, kwp, orientacao, instalacao, preco) VALUES (:cliente_id, :kwp, :orientacao, :instalacao, :preco)";
        $stmt = $this->db->prepare($query);

        $this->cliente_id = htmlspecialchars(strip_tags($this->cliente_id));
        $this->kwp = htmlspecialchars(strip_tags($this->kwp));
        $this->orientacao = htmlspecialchars(strip_tags($this->orientacao));
        $this->instalacao = htmlspecialchars(strip_tags($this->instalacao));
        $this->preco = htmlspecialchars(strip_tags($this->preco));

        $stmt->bindParam(':cliente_id', $this->cliente_id);
        $stmt->bindParam(':kwp', $this->kwp);
        $stmt->bindParam(':orientacao', $this->orientacao);
        $stmt->bindParam(':instalacao', $this->instalacao);
        $stmt->bindParam(':preco', $this->preco);

        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET kwp = :kwp, orientacao = :orientacao, instalacao = :instalacao, preco = :preco WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $this->kwp = htmlspecialchars(strip_tags($this->kwp));
        $this->orientacao = htmlspecialchars(strip_tags($this->orientacao));
        $this->instalacao = htmlspecialchars(strip_tags($this->instalacao));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':kwp', $this->kwp);
        $stmt->bindParam(':orientacao', $this->orientacao);
        $stmt->bindParam(':instalacao', $this->instalacao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }
    
}
?>
