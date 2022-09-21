<?php
session_start();

require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo DOCTYPE;

echo HTML_OPEN;

echo HEAD_OPEN;

require_once 'cabecalho.php';

echo '<script src="tipo-placa-cadastro.ts"></script>';

echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

echo DIV_RIGHT;

$tipo_placa = array();

$FORM_OPEN = '<form action="tipo-placa-salvar.php" method="get">';

echo $FORM_OPEN;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'Cliente'  . TH_CLOSE . TR_CLOSE; 

$LINK = '<a href="tipo-placa-pesquisa.php">Clique aqui para pesquisar</a>';

echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Descrição' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$tipo_placa['TIPO_PLACA_DESCRICAO'] = isset($_GET['TIPO_PLACA_DESCRICAO']) ? $_GET['TIPO_PLACA_DESCRICAO'] : '';
$INPUT = '<input type="text" id="TIPO_PLACA_DESCRICAO" name="TIPO_PLACA_DESCRICAO" maxlength="50" value="' . $tipo_placa['TIPO_PLACA_DESCRICAO'] .'">';

echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$SUBMIT = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo TR_OPEN . TD_OPEN. $SUBMIT . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo FORM_CLOSE;

echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;