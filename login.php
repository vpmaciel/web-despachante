<?php
session_start();

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;
echo open_html;
echo open_head;
require_once 'cabecalho.php';
require_once 'login.js';
echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

$USUARIO = array();

$form_open = '<form action="login-controle.php" method="post">';

echo $form_open;

echo open_table;

echo open_tr . open_th . 'Login'  . close_th . close_tr; 

echo open_tr . open_td. open_label . 'Usuario' . close_lable . close_td . close_tr; 
$USUARIO['USUARIO_NOME'] = isset($_POST['USUARIO_NOME']) ? $_POST['USUARIO_NOME'] : '';
$input = '<input type="text" id="USUARIO_NOME" name="USUARIO_NOME" value="' . $USUARIO['USUARIO_NOME'] .'">';
echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Senha' . close_lable . close_td . close_tr; 
$USUARIO['USUARIO_SENHA'] = isset($_POST['USUARIO_SENHA']) ? $_POST['USUARIO_SENHA'] : '';
$input = '<input type="password" id="USUARIO_SENHA" name="USUARIO_SENHA" value="' . $USUARIO['USUARIO_SENHA'] .'">';
echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . '&nbsp;' . close_lable . close_td . close_tr; 

$submit = '<input type="submit" value="ENVIAR" onclick=\'return confirmar();\'>';
echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;