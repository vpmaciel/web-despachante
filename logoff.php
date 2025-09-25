<?php
// Destruir o cookie 'cookieConsent'
setcookie('cookieConsent', '', time() - 3600, '/');
setcookie('usuario_nome', '', time() - 3600, '/');

// Verificar se o cookie foi destruído
if (!isset($_COOKIE['usuario_nome'])) {
    header('location: sucesso.php?msg=Sessão encerrada com sucesso!');
} else {
    header('location:index.php');
    exit;

}
