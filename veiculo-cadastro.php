<?php
session_start();

require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo html_open;

echo head_open;

require_once 'cabecalho.php';

echo head_close;

echo body_open;

echo div_main_open;

require_once 'menu.php';

$registro = array();

$form_open = '<form action="veiculo-salvar.php" method="get">';

IF (!isset($_GET['veiculo_id'])) {
    $registro['veiculo_id'] = '';
}

IF (isset($_GET['EDITAR'])) {

    $SQL="SELECT * FROM VEICULO where veiculo_id = '" . $_GET['veiculo_id'] . "';" ;
    $stmt = $pdo->prepare($SQL);
    $stmt->execute();
    
    while($registro = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $registro['veiculo_id'] = $registro['veiculo_id'];
        $registro['veiculo_placa'] = $registro['veiculo_placa'];
        $registro['veiculo_cpf_cnpj_proprietario'] = $registro['veiculo_cpf_cnpj_proprietario']; 
        $registro['veiculo_nome_proprietario'] = $registro['veiculo_nome_proprietario'];     
        $registro['veiculo_marca'] = $registro['veiculo_marca'];     
        $registro['veiculo_modelo'] = $registro['veiculo_modelo'];             
    }  

}
   

echo $form_open;

echo table_open;

echo tr_open . th_open . 'Veículo'  . th_close . tr_close; 

$LINK = '<a href="veiculo-pesquisa.php">Pesquisar</a>';

echo td_close . $LINK . td_close . tr_close;

$LINK = '<a href="veiculo-dashboard.php">Dashboard</a>';

echo td_close . $LINK . td_close . tr_close;

$registro['veiculo_id'] = isset($_GET['veiculo_id']) ? $_GET['veiculo_id'] : '';
$input = '<input type="hidden" id="veiculo_id" name="veiculo_id" maxlength="7" value="' . $registro['veiculo_id'] .'">';

echo td_close . $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'PLACA' . lable_close . td_close . tr_close; 

$registro['veiculo_placa'] = isset($_GET['veiculo_placa']) ? $_GET['veiculo_placa'] : '';
$input = '<input type="text" id="veiculo_placa" name="veiculo_placa" maxlength="7" value="' . $registro['veiculo_placa'] .'">';

echo td_close . $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'CPF | CNPJ DO PROPRIETÁRIO' . lable_close . td_close . tr_close; 

$registro['veiculo_cpf_cnpj_proprietario'] = isset($_GET['veiculo_cpf_cnpj_proprietario']) ? $_GET['veiculo_cpf_cnpj_proprietario'] : '';
$input = '<input type="text" id="veiculo_cpf_cnpj_proprietario" name="veiculo_cpf_cnpj_proprietario" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['veiculo_cpf_cnpj_proprietario'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'NOME DO PROPRIETÁRIO' . lable_close . td_close . tr_close; 

$registro['veiculo_nome_proprietario'] = isset($_GET['veiculo_nome_proprietario']) ? $_GET['veiculo_nome_proprietario'] : '';
$input = '<input type="text" id="veiculo_nome_proprietario" name="veiculo_nome_proprietario" maxlength="50" value="' . $registro['veiculo_nome_proprietario'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'MARCA DO VEÍCULO' . lable_close . td_close . tr_close; 

$registro['veiculo_marca'] = isset($_GET['veiculo_marca']) ? $_GET['veiculo_marca'] : '';
$input = '<input type="text" id="veiculo_marca" name="veiculo_marca" maxlength="50" value="' . $registro['veiculo_marca'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'MODELO DO VEÍCULO' . lable_close . td_close . tr_close; 

$registro['veiculo_modelo'] = isset($_GET['veiculo_modelo']) ? $_GET['veiculo_modelo'] : '';
$input = '<input type="text" id="veiculo_modelo" name="veiculo_modelo" maxlength="50" value="' . $registro['veiculo_modelo'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;


echo tr_open . td_open. label_open . '&nbsp;' . lable_close . td_close . tr_close; 

$submit = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo tr_open . td_open. $submit . td_close . tr_close;

echo table_close;

echo form_close;

echo div_close;

echo '<script src="veiculo-cadastro.ts"></script>';

echo body_close;
	
echo htm_close;