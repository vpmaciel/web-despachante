<?php


require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;
echo open_html;
echo open_head;
require_once 'cabecalho.php';

echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

echo open_h1 . 'Login'  . close_h1; 

$USUARIO = array();

$form_open = '<form action="login-controle.php" method="post">';

echo $form_open;

echo open_table;

echo open_tr . open_td_2 . open_label . 'E-mail' . close_lable . close_td; 
$USUARIO['usuario_email'] = isset($_POST['usuario_email']) ? $_POST['usuario_email'] : '';
$input = '<input type="text" id="usuario_email" name="usuario_email" value="' . $USUARIO['usuario_email'] .'">';
echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . 'Senha' . close_lable . close_td; 
$USUARIO['usuario_senha'] = isset($_POST['usuario_senha']) ? $_POST['usuario_senha'] : '';
$input = '<input type="password" id="usuario_senha" name="usuario_senha" value="' . $USUARIO['usuario_senha'] .'">';
echo open_td . $input . close_td . close_tr;

echo open_tr . open_td_2 . open_label . '' . close_lable . close_td; 

$submit = '<input type="submit" value="Entrar">';

if (!isset($_COOKIE['usuario_email'])) {
    echo open_td . $submit . close_td . close_tr;
}

echo open_tr . open_td_2 . open_label . '' . close_lable . close_td; 

if (isset($_COOKIE['usuario_email'])) {
    echo open_td . '<div class="botoes"><a href="logoff.php">Sair</a></div>' . close_td . close_tr; 
}


echo close_table;

echo '<br>';



echo close_form;

echo close_div;

echo close_body;
	
echo close_html;