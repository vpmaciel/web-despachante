<?php
session_start(); // Sempre antes de qualquer saída

require_once '../lib/lib-biblioteca.php';

echo doctype;

echo open_html;

echo open_head;

require_once '../cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once '../menu.php';

$usuario = array();

if (!isset($_SESSION['usuario_nome'])) {
    $form_open = '<form action="../erp-login/login-controle.php" method="post">';
} else {
    $form_open = '<form action="../erp-login/logout.php" method="post">';
}

echo $form_open;

echo '<br>';

if (!isset($_SESSION['usuario_nome'])) {
    echo open_table;

    echo open_tr . open_td . open_label . 'Usuário' . close_lable . close_td . close_tr;
    $usuario['usuario_nome'] = isset($_POST['usuario_nome']) ? $_POST['usuario_nome'] : '';
    $input = '<input type="text" id="usuario_nome" name="usuario_nome" value="' . $usuario['usuario_nome'] . '">';
    echo open_tr . open_td . $input . close_td . close_tr;

    echo open_tr . open_td . open_label . 'Senha' . close_lable . close_td . close_tr;
    $usuario['usuario_senha'] = isset($_POST['usuario_senha']) ? $_POST['usuario_senha'] : '';
    $input = '<input type="password" id="usuario_senha" name="usuario_senha" value="' . $usuario['usuario_senha'] . '">';
    echo open_tr . open_td . $input . close_td . close_tr;

    echo open_tr . open_td . open_label . '' . close_lable . close_td . close_tr;

    $submit = '<input type="submit" value="Entrar">';

    echo open_tr . open_td . $submit . close_td . close_tr;

    echo close_table;
} else {
    $submit = '<input type="submit" value="Logoff" style="display: block; margin: 0 auto;">';

    echo open_tr . open_td . $submit . close_td . close_tr;
}

echo close_form;

echo '<script src="home.js"></script>';

echo '<script src="../rodape.js"></script>';

echo close_div;

echo close_body;

echo close_html;
