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

// SQL para criar a tabela 'clientes'
$sqlClientes = "
CREATE TABLE IF NOT EXISTS clientes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    Nome TEXT NOT NULL,
    CPF TEXT NOT NULL,
    DataNascimento DATE
);
";

// SQL para criar a tabela 'orcamentos'
$sqlOrcamentos = "
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

// Executar a SQL para criar a tabela 'clientes'
try {
    $db->exec($sqlClientes);
} catch (PDOException $e) {
    echo "Erro ao criar tabela 'clientes': " . $e->getMessage() . "<br>";
}

// Executar a SQL para criar a tabela 'orcamentos'
try {
    $db->exec($sqlOrcamentos);
} catch (PDOException $e) {
    echo "Erro ao criar tabela 'orcamentos': " . $e->getMessage();
}
?>
