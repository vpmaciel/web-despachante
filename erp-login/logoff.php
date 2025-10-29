<script>document.cookie="cookieConsent=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/";</script>
<script>document.cookie="usuario_nome=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/";</script>

<?php
// Destruir o cookie 'cookieConsent'
setcookie('cookieConsent', '', time() - 3600, '/');
setcookie('usuario_nome', '', time() - 3600, '/');
unset($_COOKIE['usuario_nome']);

// Verificar se o cookie foi destruído
if (!isset($_COOKIE['usuario_nome'])) {
    header('location: ../erp-msg/sucesso.php?msg=Sessão encerrada com sucesso!');
} else {
    header('location:../index.php');
    exit;

}
?>
