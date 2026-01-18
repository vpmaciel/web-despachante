<?php

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

$servicoDAO = new ServicoDAO();

//	Obtém os dados do formulário, trata-os e os coloca em um array

$registro['servico_id'] = trim($_POST['servico_id']);
$registro['servico_data'] = trim($_POST['servico_data']);
$registro['servico_placa_veiculo'] = strtoupper(trim($_POST['servico_placa_veiculo']));
$registro['servico_descricao'] = strtoupper(trim($_POST['servico_descricao']));
$registro['servico_valor'] = str_replace(',', '.', preg_replace('/[^0-9,]/', '', trim($_POST['servico_valor'])));
$registro['servico_cpf_cnpj_cliente'] = strtoupper(trim($_POST['servico_cpf_cnpj_cliente']));
$registro['servico_telefone_cliente'] = trim($_POST['servico_telefone_cliente']);


if (!isset($registro['servico_id']) || $registro['servico_id'] === '') {

	$resultado_inserir = $servicoDAO->inserirRegistro($registro);

	if ($resultado_inserir == true) {
		header('location:../erp-msg/sucesso.php');
		exit;
	} else {
		header('location:../erp-msg/erro.php');
		exit;
	}
} else {

	$resultado_atualizar = $servicoDAO->atualizarRegistro($registro);

	if ($resultado_atualizar == true) {
		header('location:../erp-msg/sucesso.php');
		exit;
	} else {
		header('location:../erp-msg/erro.php');
		exit;
	}
}
