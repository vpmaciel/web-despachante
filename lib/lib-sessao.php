<?php
if (!isset($_COOKIE['usuario_email'])) {
	header('location:erro.php?msg=Usuário não está logado !');
	exit;
}

