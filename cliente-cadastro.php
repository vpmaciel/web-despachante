<?php

session_start();

require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';

echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

$registro = array();

$numero_de_registros = retornar_total_registros('cliente');

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

echo open_table;

echo open_tr . open_th . 'Cliente'  . close_th . close_tr; 

$LINK = '<a href="cliente-pesquisa.php">Pesquisar</a>';

echo open_td . $LINK . close_td . close_tr;
$LINK = '<a href="cliente-dashboard.php">Dashboard</a>';

echo open_td . $LINK . close_td . close_tr;

echo open_tr . open_td. open_label . 'Nome' . close_lable . close_td . close_tr; 

$registro = [];


$registro['cliente_id'] = isset($_GET['cliente_id']) ? $_GET['cliente_id'] : '';
$input = '<input type="hidden" id="cliente_id" name="cliente_id" maxlength="50" value="' . $registro['cliente_id'] .'">';

echo $input;

$registro['cliente_nome_completo'] = isset($_GET['cliente_nome_completo']) ? $_GET['cliente_nome_completo'] : '';
$input = '<input type="text" id="cliente_nome_completo" name="cliente_nome_completo" maxlength="50" value="' . $registro['cliente_nome_completo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ' . close_lable . close_td . close_tr; 

$registro['cliente_cpf_cnpj'] = isset($_GET['cliente_cpf_cnpj']) ? $_GET['cliente_cpf_cnpj'] : '';
$input = '<input type="text" id="cliente_cpf_cnpj" name="cliente_cpf_cnpj" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['cliente_cpf_cnpj'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Telefone' . close_lable . close_td . close_tr; 

$registro['cliente_telefone'] = isset($_GET['cliente_telefone']) ? $_GET['cliente_telefone'] : '';
$input = '<input type="text" id="cliente_telefone" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['cliente_telefone'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'E-Mail' . close_lable . close_td . close_tr; 

$registro['cliente_email'] = isset($_GET['cliente_email']) ? $_GET['cliente_email'] : '';
$input = '<input type="text" id="cliente_email" name="cliente_email" maxlength="70"  value="' . $registro['cliente_email'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . $numero_de_registros . ' registros cadastrados.' . close_lable . close_td . close_tr; 

$submit = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo '<script src="cliente-cadastro.ts"></script>';

echo close_div;

echo close_body;
	
echo close_html;