<?php
class Database {
    private $connection;

    public function __construct() {
        $this->connection = new PDO('sqlite:./database.sqlite');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->connection;
    }
}

// Instanciar a classe Database
$database = new Database();
$db = $database->getConnection();

// SQL para criar a tabela
$sql = "
CREATE TABLE IF NOT EXISTS orcamentos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    cliente_id INTEGER NOT NULL,
    kwp TEXT NOT NULL,
    orientacao TEXT NOT NULL,
    instalacao TEXT NOT NULL,
    preco REAL NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);
";

// Executar a SQL para criar a tabela
try {
    $db->exec($sql);
} catch (PDOException $e) {
    echo "Erro ao criar tabela: " . $e->getMessage();
}
?>
