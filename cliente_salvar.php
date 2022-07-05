<?php
session_start();

if(!isset($_SESSION['usu_id'])) {
	header('location:..\view\erro.php?e=UNL');
	exit;
}
require_once '../lib/lib_biblioteca.php';
require_once '../modelo/modelo.php';

$cliente = new cliente();


$cliente->cliente_cpf_cnpj = formatar_dados($_GET['CLIENTE_NOME']);
$cliente->cliente_nome = formatar_dados($_GET['CLIENTE_CPF_CNPJ']);
$cliente->cliente_telefone_principal = formatar_dados($_GET['CLIENTE_TELEFONE_PRINCIPAL']);
$cliente->cliente_telefone_secundario = formatar_dados($_GET['CLIENTE_TELEFONE_SECUNDARIO']);

####################################################################################################


if (!isset($publica_vaga_model['pub_vag_id'])) {
    $resultado_inserir = inserir('publica_vaga', $publica_vaga_model);
    
    if ($resultado_inserir == TRUE) {
		header('location:..\view\view_sucesso.php?url_voltar=view_publica_vaga_lista');
		exit;
	} else {
		header('location: ..\view\view_erro.php?e=OPN');
		exit;
	} 
} else {
    
	
	$condicao['pub_vag_id'] = $_GET['pub_vag_id'];

	
	$resultado_atualizar = atualizar('publica_vaga', $publica_vaga_model, $condicao);
	
	if ($resultado_atualizar == TRUE) {
		
		header('location:..\view\view_sucesso.php?url_voltar=view_publica_vaga_lista');
		exit;
	} else {
		header('location: ..\view\view_erro.php?e=OPN');
		exit;
	}   
}
