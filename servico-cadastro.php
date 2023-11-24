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

$numero_de_registros = retornar_total_registros('servico');

$registro = array();

$registro['servico_id'] = '';
$registro['servico_valor'] = '';
$registro['servico_data'] = date('Y-m-d');
$registro['servico_placa_veiculo'] = '';
$registro['servico_descricao'] = '';
$registro['servico_cpf_cnpj_cliente'] = '';
$registro['servico_nome_cliente'] = '';
$registro['servico_telefone_cliente'] = '';


if (!isset($_GET['servico_id'])) {
    $registro['servico_id'] = '';
}

if (isset($_GET['editar'])) {

    $SQL="SELECT * FROM servico where servico_id = '" . $_GET['servico_id'] . "';" ;
    $stmt = $pdo->prepare($SQL);
    $stmt->execute();
    
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $registro['servico_id'] = $linha['servico_id'];
        $registro['servico_data'] = $linha['servico_data'];
        $registro['servico_valor'] = formatarNumero($linha['servico_valor']);
        $registro['servico_placa_veiculo'] = $linha['servico_placa_veiculo']; 
        $registro['servico_descricao'] = $linha['servico_descricao'];
        $registro['servico_cpf_cnpj_cliente'] = $linha['servico_cpf_cnpj_cliente'];
        $registro['servico_nome_cliente'] = $linha['servico_nome_cliente']; 
        $registro['servico_telefone_cliente'] = $linha['servico_telefone_cliente'];
    }  

}

$form_open = '<form action="servico-salvar.php" method="POST">';

echo $form_open;

echo open_table;

echo open_tr . open_th . 'Serviço'  . close_th . close_tr; 

$LINK = '<a href="servico-pesquisa.php">Pesquisar</a>';

echo open_td . $LINK . close_td . close_tr;

$LINK = '<a href="servico-dashboard.php">Dashboard</a>';

echo open_td . $LINK . close_td . close_tr;

$input = '<input type="hidden" id="servico_id" name="servico_id" value="' . $registro['servico_id'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

$input = '<input type="hidden" id="servico_data" name="servico_data" value="' . $registro['servico_data'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;


echo open_tr . open_td. open_label . 'Placa do veículo' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_placa_veiculo" name="servico_placa_veiculo" maxlength="8" value="' . $registro['servico_placa_veiculo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Valor (R$)' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_valor" name="servico_valor" value="' . $registro['servico_valor'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Descrição' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_descricao" name="servico_descricao" maxlength="50" value="' . $registro['servico_descricao'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ do cliente' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_cpf_cnpj_cliente" name="servico_cpf_cnpj_cliente" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['servico_cpf_cnpj_cliente'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Nome do cliente' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_nome_cliente" name="servico_nome_cliente" maxlength="50" value="' . $registro['servico_nome_cliente'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Telefone do cliente' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="servico_telefone_cliente" name="servico_telefone_cliente" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['servico_telefone_cliente'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . $numero_de_registros . ' registros cadastrados' . close_lable . close_td . close_tr; 

$submit = '<input type="submit" value="Salvar">';

echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;