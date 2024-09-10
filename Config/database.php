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
?>
