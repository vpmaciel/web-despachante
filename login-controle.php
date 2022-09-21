<?php
session_start();

require_once 'lib/lib-biblioteca.php';
$usuario = array();
$usuario['USUARIO_NOME'] = trim($_POST['USUARIO_NOME']);
$usuario['USUARIO_SENHA'] = trim($_POST['USUARIO_SENHA']);

$USUARIO_NOME = array ('USUARIO_NOME' =>$usuario['USUARIO_NOME']);

$registros = retornar_numero_registros('usuario', $USUARIO_NOME);

if ($registros == 0) {
	header('location: erro.php?msg=E-mail ou senha incorretos !');
	exit;
} else {	

	if (!isset($_SESSION['USUARIO_NOME'])) {
		$usuario_json = json_decode(selecionar('usuario', $USUARIO_NOME));	
		
		foreach($usuario_json as $registro) {
			$_SESSION['USUARIO_NOME'] = $registro->USUARIO_NOME;					
		}
		
		header('location: sucesso.php?msg=Sessão criada com sucesso !');
		exit;
	} else {		
		header('location: erro.php?msg=Usuário já está logado !');
		exit;
	}
}