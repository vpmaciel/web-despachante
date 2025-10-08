<?php

require_once '../lib/lib-sessao.php';
require_once '../lib/lib-biblioteca.php';

if($_SERVER["REQUEST_METHOD"] != "GET") {	
	header('location:index.php');
}

$registro = array ('cliente_id' => trim($_GET['cliente_id']));

$resultado_excluir = false;

try {
    // Preparar a query SQL para deletar
    $sql = "DELETE FROM cliente WHERE cliente_id = :cliente_id";
    
    $stmt = $pdo->prepare($sql);

    // Bind do parâmetro
    $stmt->bindParam(':cliente_id', $registro['cliente_id'], PDO::PARAM_INT);

    // Executar a query
    $resultado_excluir = $stmt->execute();

    echo "Registro excluído com sucesso!";
} catch (PDOException $e) {
    exit("Erro: " . $e->getMessage());
}


if ($resultado_excluir == true) {
	header('location:../erp-msg/sucesso.php');
	exit;
} else {
	header('location:../erp-msg/erro.php');
	exit;
} 