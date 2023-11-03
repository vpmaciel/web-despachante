<?php
session_start();

require_once 'lib/lib-biblioteca.php';
$USUARIO = array();
$USUARIO['USUARIO_NOME'] = trim($_POST['USUARIO_NOME']);
$USUARIO['USUARIO_SENHA'] = trim($_POST['USUARIO_SENHA']);

$USUARIO_NOME = array ('USUARIO_NOME' =>$USUARIO['USUARIO_NOME']);

$registroS = retornar_numero_registros('USUARIO', $USUARIO_NOME);

if ($registroS == 0) {
	header('location: erro.php?msg=E-mail ou Senha incorretos !');
	exit;
} else {	

	if (!isset($_SESSION['USUARIO_NOME'])) {
		$USUARIO_JSON = json_decode(selecionar('USUARIO', $USUARIO_NOME));	
		
		foreach($USUARIO_JSON as $registro) {
			$_SESSION['USUARIO_NOME'] = $registro->USUARIO_NOME;					
		}		
		header('location: sucesso.php?msg=Sessão criada com sucesso !');
		exit;
	} else {		
		header('location: erro.php?msg=Usuário já está logado !');
		exit;
	}
}