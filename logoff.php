<?php
session_start();

if(isset($_SESSION['usuario_nome'])) {
    unset($_SESSION['usuario_nome']);
    session_destroy();
    header('location:sucesso.php?msg=Logoff realizado com sucesso !');
    exit;
}else {
    header('location:erro.php?e=OPN&msg=Usuário não está logado !');
    exit;
}