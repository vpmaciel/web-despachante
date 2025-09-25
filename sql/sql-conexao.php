<?php
$dns = "mysql:host=localhost;dbname=DB_DESPACHANTE";
$pdo = new PDO($dns, "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class Conexao {
    private $dns;
    private $pdo;

    public function __construct() {
        $this->dns = "mysql:host=localhost;dbname=DB_DESPACHANTE";
        $this->pdo = new PDO($this->dns, "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPdo() {
        return $this->pdo;
    }
}