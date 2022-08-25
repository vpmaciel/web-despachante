<?php
session_start();

require_once 'lib/lib-biblioteca.php';
require_once 'modelo/modelo.php';

$usuario =  new usuario;
$usuario->usuario_nome = $_POST['usuario_nome'];
$usuario->usuario_senha = $_POST['usuario_senha'];

$registros = retornar_numero_registros('usuario', (array) $usuario);

if ($registros == 0) {
	header('location: erro.php?msg=E-mail ou senha incorretos !');
	exit;
} else {	

	if (!isset($_SESSION['usuario_nome'])) {
		$usuario_json = json_decode(selecionar('usuario', (array) $usuario));	
		
		foreach($usuario_json as $registro) {
			$_SESSION['usuario_nome'] = $registro->USUARIO_NOME;					
		}
		
		header('location: sucesso.php?msg=Sessão criada com sucesso !');
		exit;
	} else {		
		header('location: erro.php?msg=Usuário já está logado !');
		exit;
	}
}