<?php
session_start();

require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo DOCTYPE;

echo HTML_OPEN;

echo HEAD_OPEN;

require_once 'cabecalho.php';

echo '<script src="cliente-cadastro.ts"></script>';

echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

$REGISTRO = array();

$FORM_OPEN = '<form action="cliente-salvar.php" method="get">';

echo $FORM_OPEN;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'SERVIÇO'  . TH_CLOSE . TR_CLOSE; 

$LINK = '<a href="cliente-pesquisa.php">Pesquisar</a>';

echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;

$LINK = '<a href="cliente-dashboard.php">Dashboard</a>';

echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;


$REGISTRO['SERVICO_ID'] = isset($_GET['SERVICO_ID']) ? $_GET['SERVICO_ID'] : '';
$INPUT = '<input type="hidden" id="SERVICO_ID" name="SERVICO_ID" maxlength="50" value="' . $REGISTRO['SERVICO_ID'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;


$REGISTRO['SERVICO_DATA'] = isset($_GET['SERVICO_DATA']) ? $_GET['SERVICO_DATA'] : '';
$INPUT = '<input type="hidden" id="SERVICO_DATA" name="SERVICO_DATA" maxlength="50" value="' . $REGISTRO['SERVICO_DATA'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'PLACA DO VEÍCULO' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['SERVICO_PLACA_VEICULO'] = isset($_GET['SERVICO_PLACA_VEICULO']) ? $_GET['SERVICO_PLACA_VEICULO'] : '';
$INPUT = '<input type="text" id="SERVICO_PLACA_VEICULO" name="SERVICO_PLACA_VEICULO" maxlength="50" value="' . $REGISTRO['SERVICO_PLACA_VEICULO'] .'">';

echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'VALOR' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['SERVICO_VALOR'] = isset($_GET['SERVICO_VALOR']) ? $_GET['SERVICO_VALOR'] : '';
$INPUT = '<input type="text" id="SERVICO_VALOR" name="SERVICO_VALOR" maxlength="15" onkeypress="mask(this, mphone);" value="' . $REGISTRO['SERVICO_VALOR'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'DESCRIÇÃO' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['SERVICO_DESCRICAO'] = isset($_GET['SERVICO_DESCRICAO']) ? $_GET['SERVICO_DESCRICAO'] : '';
$INPUT = '<input type="text" id="SERVICO_DESCRICAO" name="SERVICO_DESCRICAO" maxlength="15" onkeypress="mask(this, mphone);" value="' . $REGISTRO['SERVICO_DESCRICAO'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'CPF | CNPJ DO CLIENTE' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['SERVICO_CPF_CNPJ_CLIENTE'] = isset($_GET['SERVICO_CPF_CNPJ_CLIENTE']) ? $_GET['SERVICO_CPF_CNPJ_CLIENTE'] : '';
$INPUT = '<input type="text" id="SERVICO_CPF_CNPJ_CLIENTE" name="SERVICO_CPF_CNPJ_CLIENTE" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $REGISTRO['SERVICO_CPF_CNPJ_CLIENTE'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'NOME DO CLIENTE' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['SERVICO_NOME_CLIENTE'] = isset($_GET['SERVICO_NOME_CLIENTE']) ? $_GET['SERVICO_NOME_CLIENTE'] : '';
$INPUT = '<input type="text" id="SERVICO_NOME_CLIENTE" name="SERVICO_NOME_CLIENTE" maxlength="15" onkeypress="mask(this, mphone);" value="' . $REGISTRO['SERVICO_NOME_CLIENTE'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'TELEFONE DO CLIENTE' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['SERVICO_TELEFONE_CLIENTE'] = isset($_GET['SERVICO_TELEFONE_CLIENTE']) ? $_GET['SERVICO_TELEFONE_CLIENTE'] : '';
$INPUT = '<input type="text" id="SERVICO_TELEFONE_CLIENTE" name="SERVICO_TELEFONE_CLIENTE" maxlength="15" onkeypress="mask(this, mphone);" value="' . $REGISTRO['SERVICO_TELEFONE_CLIENTE'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$SUBMIT = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo TR_OPEN . TD_OPEN. $SUBMIT . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo FORM_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;