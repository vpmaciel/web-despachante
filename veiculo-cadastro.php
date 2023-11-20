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

$numero_de_registros = retornar_total_registros('veiculo');

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

echo open_table;

echo open_tr . open_th . 'Veículo'  . close_th . close_tr; 

$LINK = '<a href="veiculo-pesquisa.php">Pesquisar</a>';

echo open_td . $LINK . close_td . close_tr;

$LINK = '<a href="veiculo-dashboard.php">Dashboard</a>';

echo open_td . $LINK . close_td . close_tr;

$registro['veiculo_id'] = isset($_GET['veiculo_id']) ? $_GET['veiculo_id'] : '';
$input = '<input type="hidden" id="veiculo_id" name="veiculo_id" maxlength="7" value="' . $registro['veiculo_id'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Placa' . close_lable . close_td . close_tr; 

$registro['veiculo_placa'] = isset($_GET['veiculo_placa']) ? $_GET['veiculo_placa'] : '';
$input = '<input type="text" id="veiculo_placa" name="veiculo_placa" maxlength="8" value="' . $registro['veiculo_placa'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ do proprietário' . close_lable . close_td . close_tr; 

$registro['veiculo_cpf_cnpj_proprietario'] = isset($_GET['veiculo_cpf_cnpj_proprietario']) ? $_GET['veiculo_cpf_cnpj_proprietario'] : '';
$input = '<input type="text" id="veiculo_cpf_cnpj_proprietario" name="veiculo_cpf_cnpj_proprietario" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['veiculo_cpf_cnpj_proprietario'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Nome do proprietário' . close_lable . close_td . close_tr; 

$registro['veiculo_nome_proprietario'] = isset($_GET['veiculo_nome_proprietario']) ? $_GET['veiculo_nome_proprietario'] : '';
$input = '<input type="text" id="veiculo_nome_proprietario" name="veiculo_nome_proprietario" maxlength="50" value="' . $registro['veiculo_nome_proprietario'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Marca do veículo' . close_lable . close_td . close_tr; 

$registro['veiculo_marca'] = isset($_GET['veiculo_marca']) ? $_GET['veiculo_marca'] : '';
$input = '<input type="text" id="veiculo_marca" name="veiculo_marca" maxlength="50" value="' . $registro['veiculo_marca'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Modelo do veículo' . close_lable . close_td . close_tr; 

$registro['veiculo_modelo'] = isset($_GET['veiculo_modelo']) ? $_GET['veiculo_modelo'] : '';
$input = '<input type="text" id="veiculo_modelo" name="veiculo_modelo" maxlength="50" value="' . $registro['veiculo_modelo'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . $numero_de_registros . ' registros cadastrados.' . close_lable . close_td . close_tr; 

$submit = '<input type="submit" value="Salvar" onclick=\'return validarFormulario();\'>';

echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo '<script src="veiculo-cadastro.ts"></script>';

echo close_body;
	
echo close_html;