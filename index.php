<?php
session_start();

// Limpa variáveis de sessão
$_SESSION = [];

// Destroi a sessão
session_destroy();

// Remove cookie corretamente (do navegador)
if (isset($_COOKIE['usuario_nome'])) {
    setcookie('usuario_nome', '', time() - 3600, '/');
}

// Redireciona SEMPRE
header('Location: erp-home/home.php');
exit;
