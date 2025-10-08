<?php

require_once '../lib/lib-sessao.php';
require_once '../lib/lib-biblioteca.php';

if($_SERVER["REQUEST_METHOD"] != "POST") {	
		header('location:index.php');
}

$registro['cliente_id'] = trim($_POST['cliente_id']);
$registro['cliente_cpf_cnpj'] = formatarCpfCnpj(trim($_POST['cliente_cpf_cnpj']));
$registro['cliente_nome_completo'] = trim($_POST['cliente_nome_completo']);
$registro['cliente_telefone'] = trim($_POST['cliente_telefone']);
$registro['cliente_email'] = trim($_POST['cliente_email']);

$condicao = array ('cliente_id' =>trim($_POST['cliente_id']));

if(!isset($registro['cliente_id']) || $registro['cliente_id'] == ''){

	$resultado_inserir = false;

	try {
		// Preparar a query SQL
		$sql = "INSERT INTO cliente 
				(cliente_cpf_cnpj, cliente_telefone, cliente_nome_completo, cliente_email) 
				VALUES 
				(:cliente_cpf_cnpj, :cliente_telefone, :cliente_nome_completo, :cliente_email)";
		
		$stmt = $pdo->prepare($sql);		
	
		// Bind dos parâmetros
		$stmt->bindParam(':cliente_cpf_cnpj', $registro['cliente_cpf_cnpj'], PDO::PARAM_STR);
		$stmt->bindParam(':cliente_telefone', $registro['cliente_telefone'], PDO::PARAM_STR);
		$stmt->bindParam(':cliente_nome_completo', $registro['cliente_nome_completo'], PDO::PARAM_STR);
		$stmt->bindParam(':cliente_email', $registro['cliente_email'], PDO::PARAM_STR);
	
		// Executar a query
		$resultado_inserir = $stmt->execute();
	
		echo "Registro inserido com sucesso!";
	} catch (PDOException $e) {
		exit("Erro: " . $e->getMessage());
	}
    
    if ($resultado_inserir == true) {
		header('location:../erp-msg/sucesso.php');
		exit;
	} else {
		header('location:../erp-msg/erro.php');
		exit;
	} 
}
else {	
	$resultado_atualizar = false;
	
	try {
		// Preparar a query SQL para atualização
		$sql = "UPDATE cliente 
				SET cliente_cpf_cnpj = :cliente_cpf_cnpj, 
					cliente_telefone = :cliente_telefone, 
					cliente_nome_completo = :cliente_nome_completo, 
					cliente_email = :cliente_email 
				WHERE cliente_id = :cliente_id";
	
		$stmt = $pdo->prepare($sql);
	
		// Bind dos parâmetros
		$stmt->bindParam(':cliente_cpf_cnpj', $registro['cliente_cpf_cnpj'], PDO::PARAM_STR);
		$stmt->bindParam(':cliente_telefone', $registro['cliente_telefone'], PDO::PARAM_STR);
		$stmt->bindParam(':cliente_nome_completo', $registro['cliente_nome_completo'], PDO::PARAM_STR);
		$stmt->bindParam(':cliente_email', $registro['cliente_email'], PDO::PARAM_STR);
		$stmt->bindParam(':cliente_id', $registro['cliente_id'], PDO::PARAM_INT);
	
		// Executar a query
		$resultado_atualizar = $stmt->execute();

	} catch (PDOException $e) {
		exit("Erro: " . $e->getMessage());
	}

	if ($resultado_atualizar == true) {		
		header('location:../erp-msg/sucesso.php');
		exit;
	} else {
		header('location:../erp-msg/erro.php');
		exit;
	}   
}