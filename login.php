<?php
session_start();

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;
echo html_open;
echo head_open;
require_once 'cabecalho.php';
require_once 'login.js';
echo head_close;

echo body_open;

echo div_main_open;

require_once 'menu.php';

$USUARIO = array();

$form_open = '<form action="login-controle.php" method="post">';

echo $form_open;

echo table_open;

echo tr_open . th_open . 'Login'  . th_close . tr_close; 

echo tr_open . td_open. label_open . 'Usuario' . lable_close . td_close . tr_close; 
$USUARIO['USUARIO_NOME'] = isset($_POST['USUARIO_NOME']) ? $_POST['USUARIO_NOME'] : '';
$input = '<input type="text" id="USUARIO_NOME" name="USUARIO_NOME" value="' . $USUARIO['USUARIO_NOME'] .'">';
echo td_close . $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'Senha' . lable_close . td_close . tr_close; 
$USUARIO['USUARIO_SENHA'] = isset($_POST['USUARIO_SENHA']) ? $_POST['USUARIO_SENHA'] : '';
$input = '<input type="password" id="USUARIO_SENHA" name="USUARIO_SENHA" value="' . $USUARIO['USUARIO_SENHA'] .'">';
echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . '&nbsp;' . lable_close . td_close . tr_close; 

$submit = '<input type="submit" value="ENVIAR" onclick=\'return confirmar();\'>';
echo tr_open . td_open. $submit . td_close . tr_close;

echo table_close;

echo form_close;

echo div_close;

echo body_close;
	
echo htm_close;