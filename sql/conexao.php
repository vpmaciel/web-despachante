<?php
$dsn = "mysql:host=localhost;dbname=DB_DESPACHANTE";
$usuario = "root";
$senha = "";

$pdo = new PDO($dsn, $usuario, $senha);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);