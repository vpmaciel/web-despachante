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

$cliente = array();

$FORM_OPEN = '<form action="../controller/ctrl_login.php" method="post">';

echo $FORM_OPEN;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'Login'  . TH_CLOSE . TR_CLOSE; 

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Nome' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$cliente['CLIENTE_NOME'] = isset($_POST['CLIENTE_NOME']) ? $_POST['CLIENTE_NOME'] : ' ';
$INPUT = '<input type="email" name="CLIENTE_NOME" required minlength="5" maxlength="100" value="' . $cliente['CLIENTE_NOME'] .'">';
echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'CPF | CNPJ' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$cliente['CLIENTE_CPF_CNPJ'] = isset($_POST['CLIENTE_CPF_CNPJ']) ? $_POST['CLIENTE_CPF_CNPJ'] : '';
$INPUT = '<input type="text" name="CLIENTE_CPF_CNPJ" required minlength="4" maxlength="4" value="' . $cliente['CLIENTE_CPF_CNPJ'] .'">';
echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Telefone' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$cliente['CLIENTE_TELEFONE_PRINCIPAL'] = isset($_POST['CLIENTE_TELEFONE_PRINCIPAL']) ? $_POST['CLIENTE_TELEFONE_PRINCIPAL'] : '';
$INPUT = '<input type="text" name="CLIENTE_TELEFONE_PRINCIPAL" required minlength="4" maxlength="4" value="' . $cliente['CLIENTE_TELEFONE_PRINCIPAL'] .'">';
echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Telefone' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$cliente['CLIENTE_TELEFONE_SECUNDARIO'] = isset($_POST['CLIENTE_TELEFONE_SECUNDARIO']) ? $_POST['CLIENTE_TELEFONE_SECUNDARIO'] : '';
$INPUT = '<input type="text" name="CLIENTE_TELEFONE_SECUNDARIO" required minlength="4" maxlength="4" value="' . $cliente['CLIENTE_TELEFONE_SECUNDARIO'] .'">';
echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$SUBMIT = '<input type="submit" value="Pesquisar" onclick=\'return confirmar();\'>';
echo TR_OPEN . TD_OPEN. $SUBMIT . TD_CLOSE . TR_CLOSE;


echo TABLE_CLOSE;

echo FORM_CLOSE;

echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;