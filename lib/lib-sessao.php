<?php
if (!isset($_COOKIE['usuario_nome'])) {
	header('location:erro.php?msg=Usuário não está logado !');
	exit;
}

