<?php
// tempo máximo de inatividade (10 minutos)
$tempo_expiracao = 600; // 600 segundos

if (isset($_SESSION['ultimo_acesso'])) {

    $tempo_passado = time() - $_SESSION['ultimo_acesso'];

    if ($tempo_passado > $tempo_expiracao) {
        // sessão expirou
        session_unset();
        session_destroy();

        header("Location: ../erp-home/home.php");
        exit;
    }
}

// atualiza o tempo de acesso
$_SESSION['ultimo_acesso'] = time();