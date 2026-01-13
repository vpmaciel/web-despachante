<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

$veiculoDAO = new VeiculoDAO();

$registro['veiculo_id'] = trim($_POST['veiculo_id']);
$registro['veiculo_placa'] = trim($_POST['veiculo_placa']);
$registro['veiculo_cpf_cnpj_proprietario'] = trim($_POST['veiculo_cpf_cnpj_proprietario']);
$registro['veiculo_nome_proprietario'] = trim($_POST['veiculo_nome_proprietario']);
$registro['veiculo_marca'] = trim($_POST['veiculo_marca']);
$registro['veiculo_modelo'] = trim($_POST['veiculo_modelo']);

if (empty($registro['veiculo_nome_proprietario'])) {

	header('Location: ' . $_SERVER['HTTP_REFERER'] . '&erro="Preencha campo Nome do Proprietário"');
	exit;
}

if (!isset($registro['veiculo_id']) || $registro['veiculo_id'] === '') {

	$resultado_inserir = $veiculoDAO->inserirRegistro($registro);

	if ($resultado_inserir == true) {
		header('location:../erp-msg/sucesso.php');
		exit;
	} else {
		header('location:../erp-msg/erro.php');
		exit;
	}
} else {

	$resultado_atualizar = $veiculoDAO->atualizarRegistro($registro);

	if ($resultado_atualizar == true) {
		header('location:../erp-msg/sucesso.php');
		exit;
	} else {
		header('location:../erp-msg/erro.php');
		exit;
	}
}
