<?php
session_start();

require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo DOCTYPE;

echo HTML_OPEN;

echo HEAD_OPEN;

require_once 'cabecalho.php';

echo '<script src="pedido-de-placa-cadastro.ts"></script>';

echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

$REGISTRO = array();

$FORM_OPEN = '<form action="pedido-de-placa-salvar.php" method="get">';

echo $FORM_OPEN;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'PEDIDO DE PLACA'  . TH_CLOSE . TR_CLOSE; 

$LINK = '<a href="pedido-de-placa-pesquisa.php">Pesquisar</a>';

echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;
$LINK = '<a href="pedido-de-placa-dashboard.php">Dashboard</a>';

echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;

$REGISTRO['PEDIDO_DE_PLACA_ID'] = isset($_GET['PEDIDO_DE_PLACA_ID']) ? $_GET['PEDIDO_DE_PLACA_ID'] : '';
$INPUT = '<input type="hidden" id="PEDIDO_DE_PLACA_ID" name="PEDIDO_DE_PLACA_ID" minlength="14" maxlength="18"  value="' . $REGISTRO['PEDIDO_DE_PLACA_ID'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

$REGISTRO['PEDIDO_DE_PLACA_DATA'] = isset($_GET['PEDIDO_DE_PLACA_DATA']) ? $_GET['PEDIDO_DE_PLACA_DATA'] : '';
$INPUT = '<input type="hidden" id="PEDIDO_DE_PLACA_DATA" name="PEDIDO_DE_PLACA_DATA" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $REGISTRO['PEDIDO_DE_PLACA_DATA'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'PLACA' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['PEDIDO_DE_PLACA_PLACA_VEICULO'] = isset($_GET['PEDIDO_DE_PLACA_PLACA_VEICULO']) ? $_GET['PEDIDO_DE_PLACA_PLACA_VEICULO'] : '';
$INPUT = '<input type="text" id="PEDIDO_DE_PLACA_PLACA_VEICULO" name="CLIENTE_NOME" maxlength="50" value="' . $REGISTRO['PEDIDO_DE_PLACA_PLACA_VEICULO'] .'">';

echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'QUANTIDADE' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['PEDIDO_DE_PLACA_QUANTIDADE'] = isset($_GET['PEDIDO_DE_PLACA_QUANTIDADE']) ? $_GET['PEDIDO_DE_PLACA_QUANTIDADE'] : '';
$INPUT = '<input type="text" id="PEDIDO_DE_PLACA_QUANTIDADE" name="PEDIDO_DE_PLACA_QUANTIDADE" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $REGISTRO['PEDIDO_DE_PLACA_QUANTIDADE'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'RENAVAM' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['PEDIDO_DE_PLACA_RENAVAM'] = isset($_GET['PEDIDO_DE_PLACA_RENAVAM']) ? $_GET['PEDIDO_DE_PLACA_RENAVAM'] : '';
$INPUT = '<input type="text" id="PEDIDO_DE_PLACA_RENAVAM" name="CLIENTE_TELEFONE" maxlength="15" onkeypress="mask(this, mphone);" value="' . $REGISTRO['PEDIDO_DE_PLACA_RENAVAM'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'CPF | CNPJ DO PROPRIETÁRIO' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['PEDIDO_DE_PLACA_CPF_CNPJ_PROPRIETARIO'] = isset($_GET['PEDIDO_DE_PLACA_CPF_CNPJ_PROPRIETARIO']) ? $_GET['PEDIDO_DE_PLACA_CPF_CNPJ_PROPRIETARIO'] : '';
$INPUT = '<input type="text" id="PEDIDO_DE_PLACA_CPF_CNPJ_PROPRIETARIO" name="CLIENTE_TELEFONE" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $REGISTRO['PEDIDO_DE_PLACA_CPF_CNPJ_PROPRIETARIO'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'COR DA PLACA' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['PEDIDO_DE_PLACA_COR_PLACA'] = isset($_GET['PEDIDO_DE_PLACA_COR_PLACA']) ? $_GET['PEDIDO_DE_PLACA_COR_PLACA'] : '';
$INPUT = '<input type="text" id="PEDIDO_DE_PLACA_COR_PLACA" name="PEDIDO_DE_PLACA_COR_PLACA" maxlength="15" onkeypress="mask(this, mphone);" value="' . $REGISTRO['PEDIDO_DE_PLACA_COR_PLACA'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'TIPO DE PLACA' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['PEDIDO_DE_PLACA_TIPO_PLACA'] = isset($_GET['PEDIDO_DE_PLACA_TIPO_PLACA']) ? $_GET['PEDIDO_DE_PLACA_TIPO_PLACA'] : '';
$INPUT = '<input type="text" id="PEDIDO_DE_PLACA_TIPO_PLACA" name="CLIENTE_TELEFONE" maxlength="15" onkeypress="mask(this, mphone);" value="' . $REGISTRO['PEDIDO_DE_PLACA_TIPO_PLACA'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$SUBMIT = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo TR_OPEN . TD_OPEN. $SUBMIT . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo FORM_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;