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

$FORM_OPEN = '<form action="veiculo-salvar.php" method="get">';

IF (!isset($_GET['VEICULO_ID'])) {
    $REGISTRO['VEICULO_ID'] = '';
}

IF (isset($_GET['EDITAR'])) {

    $SQL="SELECT * FROM VEICULO WHERE VEICULO_ID = '" . $_GET['VEICULO_ID'] . "';" ;
    $STMT = $PDO->prepare($SQL);
    $STMT->execute();
    
    while($REGISTRO = $STMT->fetch(PDO::FETCH_ASSOC))
    {
        $REGISTRO['VEICULO_ID'] = $REGISTRO['VEICULO_ID'];
        $REGISTRO['VEICULO_PLACA'] = $REGISTRO['VEICULO_PLACA'];
        $REGISTRO['VEICULO_CPF_CNPJ_PROPRIETARIO'] = $REGISTRO['VEICULO_CPF_CNPJ_PROPRIETARIO']; 
        $REGISTRO['VEICULO_NOME_PROPRIETARIO'] = $REGISTRO['VEICULO_NOME_PROPRIETARIO'];     
        $REGISTRO['VEICULO_MARCA'] = $REGISTRO['VEICULO_MARCA'];     
        $REGISTRO['VEICULO_MODELO'] = $REGISTRO['VEICULO_MODELO'];             
    }  

}
   

echo $FORM_OPEN;

echo TABLE_OPEN;

echo TR_OPEN . TH_OPEN . 'Veículo'  . TH_CLOSE . TR_CLOSE; 

$LINK = '<a href="veiculo-pesquisa.php">Pesquisar</a>';

echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;

$LINK = '<a href="veiculo-dashboard.php">Dashboard</a>';

echo TD_OPEN . $LINK . TD_CLOSE . TR_CLOSE;

$REGISTRO['VEICULO_ID'] = isset($_GET['VEICULO_ID']) ? $_GET['VEICULO_ID'] : '';
$INPUT = '<input type="hidden" id="VEICULO_ID" name="VEICULO_ID" maxlength="7" value="' . $REGISTRO['VEICULO_ID'] .'">';

echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'PLACA' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['VEICULO_PLACA'] = isset($_GET['VEICULO_PLACA']) ? $_GET['VEICULO_PLACA'] : '';
$INPUT = '<input type="text" id="VEICULO_PLACA" name="VEICULO_PLACA" maxlength="7" value="' . $REGISTRO['VEICULO_PLACA'] .'">';

echo TD_OPEN . $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'CPF | CNPJ DO PROPRIETÁRIO' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['VEICULO_CPF_CNPJ_PROPRIETARIO'] = isset($_GET['VEICULO_CPF_CNPJ_PROPRIETARIO']) ? $_GET['VEICULO_CPF_CNPJ_PROPRIETARIO'] : '';
$INPUT = '<input type="text" id="VEICULO_CPF_CNPJ_PROPRIETARIO" name="VEICULO_CPF_CNPJ_PROPRIETARIO" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $REGISTRO['VEICULO_CPF_CNPJ_PROPRIETARIO'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'NOME DO PROPRIETÁRIO' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['VEICULO_NOME_PROPRIETARIO'] = isset($_GET['VEICULO_NOME_PROPRIETARIO']) ? $_GET['VEICULO_NOME_PROPRIETARIO'] : '';
$INPUT = '<input type="text" id="VEICULO_NOME_PROPRIETARIO" name="VEICULO_NOME_PROPRIETARIO" maxlength="50" value="' . $REGISTRO['VEICULO_NOME_PROPRIETARIO'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'MARCA DO VEÍCULO' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['VEICULO_MARCA'] = isset($_GET['VEICULO_MARCA']) ? $_GET['VEICULO_MARCA'] : '';
$INPUT = '<input type="text" id="VEICULO_MARCA" name="VEICULO_MARCA" maxlength="50" value="' . $REGISTRO['VEICULO_MARCA'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TR_OPEN . TD_OPEN. LABEL_OPEN . 'MODELO DO VEÍCULO' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$REGISTRO['VEICULO_MODELO'] = isset($_GET['VEICULO_MODELO']) ? $_GET['VEICULO_MODELO'] : '';
$INPUT = '<input type="text" id="VEICULO_MODELO" name="VEICULO_MODELO" maxlength="50" value="' . $REGISTRO['VEICULO_MODELO'] .'">';

echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;


echo TR_OPEN . TD_OPEN. LABEL_OPEN . '&nbsp;' . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$SUBMIT = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo TR_OPEN . TD_OPEN. $SUBMIT . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo FORM_CLOSE;

echo DIV_CLOSE;

echo '<script src="veiculo-cadastro.ts"></script>';

echo BODY_CLOSE;
	
echo HTML_CLOSE;