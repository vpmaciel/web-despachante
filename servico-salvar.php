<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

$registro['servico_data'] = trim($_POST['servico_data']);
$registro['servico_placa_veiculo'] = trim($_POST['servico_placa_veiculo']);
$registro['servico_descricao'] = trim($_POST['servico_descricao']);
$registro['servico_valor'] = str_replace(',', '.', preg_replace('/[^0-9,]/', '', trim($_POST['servico_valor'])));
$registro['servico_cpf_cnpj_cliente'] = trim($_POST['servico_cpf_cnpj_cliente']);
$registro['servico_nome_cliente'] = trim($_POST['servico_nome_cliente']);
$registro['servico_telefone_cliente'] = trim($_POST['servico_telefone_cliente']);

$condicao = array ('servico_id' =>trim($_POST['servico_id']));

$total_registro = retornar_numero_registros('servico', $condicao);
//exit($total_registro);
if($total_registro == 0){
	$resultado_inserir = inserir('servico', $registro);
    
    if ($resultado_inserir == true) {
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	} 
}
else {	
	$resultado_atualizar = atualizar('servico', $registro, $condicao);
	
	if ($resultado_atualizar == true) {
		
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	}   
}