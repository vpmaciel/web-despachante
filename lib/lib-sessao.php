<?php
ini_set('display_errors', true);

error_reporting(E_ALL);

setlocale(LC_ALL, 'pt_BR.utf8');

if (!isset($_COOKIE['usuario_nome'])) {
	header('location: ../erp-msg/erro.php?msg=Usuário não está logado !');
	exit;
}

if (!isset($_COOKIE['usuario_nome'])) {
	header('location: ../erp-msg/erro.php?msg=Usuário não está logado !');
	exit;
}
