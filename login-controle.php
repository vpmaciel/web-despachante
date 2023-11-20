<?php
session_start();

require_once 'lib/lib-biblioteca.php';
$USUARIO = array();
$USUARIO['usuario_nome'] = trim($_POST['usuario_nome']);
$USUARIO['usuario_senha'] = trim($_POST['usuario_senha']);

$usuario_nome = array ('usuario_nome' =>$USUARIO['usuario_nome']);

$registroS = retornar_numero_registros('USUARIO', $usuario_nome);

if ($registroS == 0) {
	header('location: erro.php?msg=E-mail ou Senha incorretos !');
	exit;
} else {	

	if (!isset($_SESSION['usuario_nome'])) {
		$USUARIO_JSON = json_decode(selecionar('USUARIO', $usuario_nome));	
		
		foreach($USUARIO_JSON as $registro) {
			$_SESSION['usuario_nome'] = $registro->usuario_nome;					
		}		
		header('location: sucesso.php?msg=Sessão criada com sucesso !');
		exit;
	} else {		
		header('location: erro.php?msg=Usuário já está logado !');
		exit;
	}
}