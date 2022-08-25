<?php
session_start();

setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib-biblioteca.php';

echo DOCTYPE;
echo HTML_OPEN;
echo HEAD_OPEN;
require_once 'cabecalho.php';
require_once 'login.js';
echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

echo DIV_RIGHT;

$usuario = array();

$FORM_OPEN = '<form action="login-controle.php" method="post">';

echo $FORM_OPEN;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'Login'  . TH_CLOSE . TR_CLOSE; 

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Usuario' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$usuario['usuario_nome'] = isset($_POST['usuario_nome']) ? $_POST['usuario_nome'] : ' ';
$INPUT = '<input type="nome" id="usuario_nome" name="usuario_nome" value="' . $usuario['usuario_nome'] .'">';
echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Senha' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$usuario['usuario_senha'] = isset($_POST['usuario_senha']) ? $_POST['usuario_senha'] : '';
$INPUT = '<input type="password" id="usuario_senha" name="usuario_senha" value="' . $usuario['usuario_senha'] .'">';
echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$SUBMIT = '<input type="submit" value="ENVIAR" onclick=\'return confirmar();\'>';
echo TR_OPEN . TD_OPEN. $SUBMIT . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo FORM_CLOSE;

echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;