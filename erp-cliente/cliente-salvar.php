<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	header('location:index.php');
}

$clienteDAO = new ClienteDAO();

//	Obtém os dados do formulário, trata-os e os coloca em um array

$registro['cliente_id'] = trim($_POST['cliente_id']);
$registro['cliente_cpf_cnpj'] = strtoupper(trim($_POST['cliente_cpf_cnpj']));
$registro['cliente_nome'] = strtoupper(trim($_POST['cliente_nome']));
$registro['cliente_telefone'] = trim($_POST['cliente_telefone']);
$registro['cliente_email'] = strtolower(trim($_POST['cliente_email']));

if (!isset($registro['cliente_id']) || $registro['cliente_id'] === '') {

	$resultado_inserir = $clienteDAO->inserirRegistro($registro);

	if ($resultado_inserir == true) {
		header('location:../erp-msg/sucesso.php');
		exit;
	} else {
		header('location:../erp-msg/erro.php');
		exit;
	}
} else {

	$resultado_atualizar = $clienteDAO->atualizarRegistro($registro);

	if ($resultado_atualizar == true) {
		header('location:../erp-msg/sucesso.php');
		exit;
	} else {
		header('location:../erp-msg/erro.php');
		exit;
	}
}
