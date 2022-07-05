<?php
session_start();

setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib_biblioteca.php';

echo DOCTYPE;
echo HTML_OPEN;
echo HEAD_OPEN;
require_once 'cabecalho.php';
require_once 'login_script.js';
echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

echo DIV_RIGHT;

$FORM_OPEN = '<button id="btn">Click me!</button>';
echo $FORM_OPEN;
$usuario = array();

$FORM_OPEN = '<form action="../controller/ctrl_login.php" method="post">';

echo $FORM_OPEN;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'Login'  . TH_CLOSE . TR_CLOSE; 

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'E-mail' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$usuario['usu_email'] = isset($_POST['usu_email']) ? $_POST['usu_email'] : ' ';
$INPUT = '<input type="email" id="usu_email" name="usu_email" required minlength="5" maxlength="100" value="' . $usuario['usu_email'] .'">';
echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Senha' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$usuario['usu_senha'] = isset($_POST['usu_senha']) ? $_POST['usu_senha'] : '';
$INPUT = '<input type="password" name="usu_senha" placeholder="0000" required minlength="4" maxlength="4" value="' . $usuario['usu_senha'] .'">';
echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$SUBMIT = '<input type="submit" value="ENVIAR" onclick=\'return confirmar();\'>';
echo TR_OPEN . TD_OPEN. $SUBMIT . TD_CLOSE . TR_CLOSE;

$LINK = '<a href="view_recupera_senha.php">Esqueci usuário ou senha</a>';
echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo FORM_CLOSE;

echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;