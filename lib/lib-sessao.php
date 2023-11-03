<?php
if (!isset($_SESSION['USUARIO_NOME'])) {
	header('location:erro.php?msg=Usuário não está logado !');
	exit;
}

