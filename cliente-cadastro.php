<?php
session_start();

require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo DOCTYPE;

echo HTML_OPEN;

echo HEAD_OPEN;

require_once 'cabecalho.php';

echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

$REGISTRO = array();

$FORM_OPEN = '<form action="cliente-salvar.php" method="get">';

IF (!isset($_GET['CLIENTE_ID'])) {
    $REGISTRO['CLIENTE_ID'] = '';
}

IF (isset($_GET['EDITAR'])) {

    $SQL="SELECT * FROM CLIENTE WHERE CLIENTE_ID = '" . $_GET['CLIENTE_ID'] . "';" ;
    $STMT = $PDO->prepare($SQL);
    $STMT->execute();
    
    while($REGISTRO = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $REGISTRO['CLIENTE_ID'] = $REGISTRO['CLIENTE_ID'];
        $REGISTRO['CLIENTE_CPF_CNPJ'] = $REGISTRO['CLIENTE_CPF_CNPJ'];
        $REGISTRO['CLIENTE_TELEFONE'] = $REGISTRO['CLIENTE_TELEFONE']; 
        $REGISTRO['CLIENTE_NOME_COMPLETO'] = $REGISTRO['CLIENTE_NOME_COMPLETO'];
        $REGISTRO['CLIENTE_EMAIL'] = $REGISTRO['CLIENTE_EMAIL'];
    }  

}
   

echo $FORM_OPEN;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'CLIENTE'  . TH_CLOSE . TR_CLOSE; 

$LINK = '<a href="cliente-pesquisa.php">Pesquisar</a>';

echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;
$LINK = '<a href="cliente-dashboard.php">Dashboard</a>';

echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Nome' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$INPUT = '<input type="hidden" id="CLIENTE_ID" name="CLIENTE_ID" value="' . $REGISTRO['CLIENTE_ID'] .'">';
echo $INPUT;


$REGISTRO['CLIENTE_NOME_COMPLETO'] = isset($_GET['CLIENTE_NOME_COMPLETO']) ? $_GET['CLIENTE_NOME_COMPLETO'] : '';
$INPUT = '<input type="text" id="CLIENTE_NOME_COMPLETO" name="CLIENTE_NOME_COMPLETO" maxlength="50" value="' . $REGISTRO['CLIENTE_NOME_COMPLETO'] .'">';

echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'CPF | CNPJ' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['CLIENTE_CPF_CNPJ'] = isset($_GET['CLIENTE_CPF_CNPJ']) ? $_GET['CLIENTE_CPF_CNPJ'] : '';
$INPUT = '<input type="text" id="CLIENTE_CPF_CNPJ" name="CLIENTE_CPF_CNPJ" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $REGISTRO['CLIENTE_CPF_CNPJ'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'Telefone' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['CLIENTE_TELEFONE'] = isset($_GET['CLIENTE_TELEFONE']) ? $_GET['CLIENTE_TELEFONE'] : '';
$INPUT = '<input type="text" id="CLIENTE_TELEFONE" name="CLIENTE_TELEFONE" maxlength="15" onkeypress="mask(this, mphone);" value="' . $REGISTRO['CLIENTE_TELEFONE'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'E-mail' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['CLIENTE_EMAIL'] = isset($_GET['CLIENTE_EMAIL']) ? $_GET['CLIENTE_EMAIL'] : '';
$INPUT = '<input type="text" id="CLIENTE_EMAIL" name="CLIENTE_EMAIL" maxlength="70"  value="' . $REGISTRO['CLIENTE_EMAIL'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$SUBMIT = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo TR_OPEN . TD_OPEN. $SUBMIT . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo FORM_CLOSE;

echo '<script src="cliente-cadastro.ts"></script>';

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;