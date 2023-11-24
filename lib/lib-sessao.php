<?php
if (!isset($_SESSION['usuario_email'])) {
	header('location:erro.php?msg=Usuário não está logado !');
	exit;
}

