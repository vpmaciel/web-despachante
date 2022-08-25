<?php
session_start();

setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib-biblioteca.php';

echo DOCTYPE;

echo HTML_OPEN;

echo HEAD_OPEN;

require_once 'cabecalho.php';
echo '<script src="cliente-cadastro.ts"></script>';

echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

echo DIV_RIGHT;

require_once 'titulo.php';

$cliente = array();

$FORM_OPEN = '<form action="cliente-salvar.php" method="post">';

echo $FORM_OPEN;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'Cliente'  . TH_CLOSE . TR_CLOSE; 

$LINK = '<a href="cliente-pesquisa.php">Clique aqui para pesquisar</a>';
echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Nome' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$cliente['CLIENTE_NOME'] = isset($_POST['CLIENTE_NOME']) ? $_POST['CLIENTE_NOME'] : '';
$INPUT = '<input type="text" id="CLIENTE_NOME" name="CLIENTE_NOME" maxlength="50" value="' . $cliente['CLIENTE_NOME'] .'">';
echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'CPF ou CNPJ' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$cliente['CLIENTE_CPF_CNPJ'] = isset($_POST['CLIENTE_CPF_CNPJ']) ? $_POST['CLIENTE_CPF_CNPJ'] : '';
$INPUT = '<input type="text" id="CLIENTE_CPF_CNPJ" name="CLIENTE_CPF_CNPJ" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $cliente['CLIENTE_CPF_CNPJ'] .'">';
echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;


echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Telefone' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
$cliente['CLIENTE_TELEFONE'] = isset($_POST['CLIENTE_TELEFONE']) ? $_POST['CLIENTE_TELEFONE'] : '';
$INPUT = '<input type="text" id="CLIENTE_TELEFONE" name="CLIENTE_TELEFONE" maxlength="15" onkeypress="mask(this, mphone);" value="' . $cliente['CLIENTE_TELEFONE'] .'">';
echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$SUBMIT = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';
echo TR_OPEN . TD_OPEN. $SUBMIT . TD_CLOSE . TR_CLOSE;


echo TABLE_CLOSE;

echo FORM_CLOSE;

echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;