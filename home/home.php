<?php

ini_set('session.name', 'SESSAO_WEB_DESPACHANTE');
session_start();

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

$form_open = '<form action="../erp-login/login-controle.php" method="post">';

echo $form_open;

echo open_table;

echo open_tr . open_td_2 . open_label . 'Usuário' . close_lable . close_td;
$usuario['usuario_nome'] = isset($_POST['usuario_nome']) ? $_POST['usuario_nome'] : '';
$input = '<input type="text" id="usuario_nome" name="usuario_nome" value="' . $usuario['usuario_nome'] . '">';
echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Senha' . close_lable . close_td;
$usuario['usuario_senha'] = isset($_POST['usuario_senha']) ? $_POST['usuario_senha'] : '';
$input = '<input type="password" id="usuario_senha" name="usuario_senha" value="' . $usuario['usuario_senha'] . '">';
echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . '' . close_lable . close_td;

$submit = '<input type="submit" value="Entrar">';

if (!isset($_COOKIE['usuario_nome'])) {
    echo open_td . $submit . close_td . close_tr;
}

if (isset($_COOKIE['usuario_nome'])) {
    echo open_td . '<div class="botoes"><a href="../erp-login/logoff.php">Sair</a></div>' . close_td . close_tr;
}

echo close_table;

echo close_form;

echo close_div;

?>

<script src="../rodape.js"></script>

<?php

echo close_body;

echo close_html;
