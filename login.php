<?php
session_start();

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo DOCTYPE;
echo HTML_OPEN;
echo HEAD_OPEN;
require_once 'cabecalho.php';
require_once 'login.js';
echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

$USUARIO = array();

$FORM_OPEN = '<form action="login-controle.php" method="post">';

echo $FORM_OPEN;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'Login'  . TH_CLOSE . TR_CLOSE; 

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Usuario' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$USUARIO['USUARIO_NOME'] = isset($_POST['USUARIO_NOME']) ? $_POST['USUARIO_NOME'] : '';
$INPUT = '<input type="text" id="USUARIO_NOME" name="USUARIO_NOME" value="' . $USUARIO['USUARIO_NOME'] .'">';
echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Senha' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$USUARIO['USUARIO_SENHA'] = isset($_POST['USUARIO_SENHA']) ? $_POST['USUARIO_SENHA'] : '';
$INPUT = '<input type="password" id="USUARIO_SENHA" name="USUARIO_SENHA" value="' . $USUARIO['USUARIO_SENHA'] .'">';
echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$SUBMIT = '<input type="submit" value="ENVIAR" onclick=\'return confirmar();\'>';
echo TR_OPEN . TD_OPEN. $SUBMIT . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo FORM_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;