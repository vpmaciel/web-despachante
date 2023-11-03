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

$form_open = '<form action="cliente-salvar.php" method="get">';

IF (!isset($_GET['cliente_id'])) {
    $registro['cliente_id'] = '';
}

IF (isset($_GET['EDITAR'])) {

    $SQL="SELECT * FROM CLIENTE where cliente_id = '" . $_GET['cliente_id'] . "';" ;
    $stmt = $pdo->prepare($SQL);
    $stmt->execute();
    
    while($registro = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $registro['cliente_id'] = $registro['cliente_id'];
        $registro['cliente_cpf_cnpj'] = $registro['cliente_cpf_cnpj'];
        $registro['cliente_telefone'] = $registro['cliente_telefone']; 
        $registro['cliente_nome_completo'] = $registro['cliente_nome_completo'];
        $registro['cliente_email'] = $registro['cliente_email'];
    }  

}
   

echo $form_open;

echo table_open;

echo tr_open . th_open . 'CLIENTE'  . th_close . tr_close; 

$LINK = '<a href="cliente-pesquisa.php">Pesquisar</a>';

echo td_close . $LINK . td_close . tr_close;
$LINK = '<a href="cliente-dashboard.php">Dashboard</a>';

echo td_close . $LINK . td_close . tr_close;

echo tr_open . td_open. label_open . 'NOME' . lable_close . td_close . tr_close; 

$registro = [];

$registro['cliente_id'] = isset($_GET['cliente_id']) ? $_GET['cliente_id'] : '';
$input = '<input type="hidden" id="cliente_id" name="cliente_id" maxlength="50" value="' . $registro['cliente_id'] .'">';

echo $input;


$registro['cliente_nome_completo'] = isset($_GET['cliente_nome_completo']) ? $_GET['cliente_nome_completo'] : '';
$input = '<input type="text" id="cliente_nome_completo" name="cliente_nome_completo" maxlength="50" value="' . $registro['cliente_nome_completo'] .'">';

echo td_close . $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'CPF | CNPJ' . lable_close . td_close . tr_close; 

$registro['cliente_cpf_cnpj'] = isset($_GET['cliente_cpf_cnpj']) ? $_GET['cliente_cpf_cnpj'] : '';
$input = '<input type="text" id="cliente_cpf_cnpj" name="cliente_cpf_cnpj" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['cliente_cpf_cnpj'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'TELEFONE' . lable_close . td_close . tr_close; 

$registro['cliente_telefone'] = isset($_GET['cliente_telefone']) ? $_GET['cliente_telefone'] : '';
$input = '<input type="text" id="cliente_telefone" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['cliente_telefone'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . 'E-MAIL' . lable_close . td_close . tr_close; 

$registro['cliente_email'] = isset($_GET['cliente_email']) ? $_GET['cliente_email'] : '';
$input = '<input type="text" id="cliente_email" name="cliente_email" maxlength="70"  value="' . $registro['cliente_email'] .'">';

echo tr_open . td_open. $input . td_close . tr_close;

echo tr_open . td_open. label_open . '&nbsp;' . lable_close . td_close . tr_close; 

$submit = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo tr_open . td_open. $submit . td_close . tr_close;

echo table_close;

echo form_close;

echo '<script src="cliente-cadastro.ts"></script>';

echo div_close;

echo body_close;
	
echo htm_close;