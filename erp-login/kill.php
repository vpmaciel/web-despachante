<?php
/* ===============================
   KILL TOTAL – SESSÃO E COOKIES
   =============================== */

error_reporting(E_ALL);
ini_set('display_errors', 1);

/* 1. Inicia a sessão, se existir */
if (session_status() !== PHP_SESSION_ACTIVE) {
}

/* 2. Limpa todas as variáveis de sessão */
$_SESSION = [];

/* 3. Destrói a sessão no servidor */
if (session_id() !== '') {
    session_destroy();
}

/* 4. Remove o cookie de sessão do PHP */
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 3600,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

/* 5. Apaga TODOS os cookies do domínio */
foreach ($_COOKIE as $nome => $valor) {
    setcookie($nome, '', time() - 3600, '/');
    unset($_COOKIE[$nome]);
}

/* 6. Força cache zero (browser) */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

/* 7. Redireciona */
header('Location: index.php?msg=logout_forcado');
exit;
