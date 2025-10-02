<?php
if (!isset($_COOKIE['usuario_nome'])) {
	header('location: ../erp-msg/erro.php?msg=Usuário não está logado !');
	exit;
}

