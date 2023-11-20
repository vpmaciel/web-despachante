<?php
if (!isset($_SESSION['usuario_nome'])) {
	header('location:erro.php?msg=Usuário não está logado !');
	exit;
}

