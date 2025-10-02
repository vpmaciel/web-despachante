<?php


require_once '../lib/lib-sessao.php';
require_once '../lib/lib-biblioteca.php';

$registro['pedido_de_placa_id'] = trim($_POST['pedido_de_placa_id']);
$registro['pedido_de_placa_data'] = trim($_POST['pedido_de_placa_data']);
$registro['pedido_de_placa_placa_veiculo'] = trim($_POST['pedido_de_placa_placa_veiculo']);
$registro['pedido_de_placa_quantidade'] = trim($_POST['pedido_de_placa_quantidade']);
$registro['pedido_de_placa_renavam'] = trim($_POST['pedido_de_placa_renavam']);
$registro['pedido_de_placa_cpf_cnpj_proprietario'] = formatarCpfCnpj(trim($_POST['pedido_de_placa_cpf_cnpj_proprietario']));
$registro['pedido_de_placa_cor_placa'] = trim($_POST['pedido_de_placa_cor_placa']);
$registro['pedido_de_placa_tipo_placa'] = trim($_POST['pedido_de_placa_tipo_placa']);

$condicao = array ('pedido_de_placa_id' =>trim($_POST['pedido_de_placa_id']));

$total_registro = retornar_numero_registros('pedido_de_placa', $condicao);
//exit($total_registro);
if($total_registro == 0){
	$resultado_inserir = inserir('pedido_de_placa', $registro);
    
    if ($resultado_inserir == true) {
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	} 
}
else {	
	$resultado_atualizar = atualizar('pedido_de_placa', $registro, $condicao);
	
	if ($resultado_atualizar == true) {
		
		header('location:sucesso.php');
		exit;
	} else {
		header('location:erro.php');
		exit;
	}   
}