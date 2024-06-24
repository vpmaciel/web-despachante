<?php


require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';

echo '<script src="pedido-de-placa-cadastro.ts"></script>';

echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

$numero_de_registros = retornar_total_registros('pedido_de_placa');

$registro = array();

$registro['pedido_de_placa_id'] = '';
$registro['pedido_de_placa_data'] = date('Y-m-d');;
$registro['pedido_de_placa_placa_veiculo'] = '';
$registro['pedido_de_placa_quantidade'] = '';
$registro['pedido_de_placa_renavam'] = '';
$registro['pedido_de_placa_cpf_cnpj_proprietario'] = '';
$registro['pedido_de_placa_cor_placa'] = '';
$registro['pedido_de_placa_tipo_placa'] = '';

if (!isset($_GET['pedido_de_placa_id'])) {
    $registro['pedido_de_placa_id'] = '';
}

if (isset($_GET['editar'])) {

    $SQL="SELECT * FROM pedido_de_placa where pedido_de_placa_id = '" . $_GET['pedido_de_placa_id'] . "';" ;
    $stmt = $pdo->prepare($SQL);
    $stmt->execute();
    
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $registro['pedido_de_placa_id'] = $linha['pedido_de_placa_id'];
        $registro['pedido_de_placa_data'] = $linha['pedido_de_placa_data'];
        $registro['pedido_de_placa_placa_veiculo'] = $linha['pedido_de_placa_placa_veiculo']; 
        $registro['pedido_de_placa_quantidade'] = $linha['pedido_de_placa_quantidade'];
        $registro['pedido_de_placa_renavam'] = $linha['pedido_de_placa_renavam'];
        $registro['pedido_de_placa_cpf_cnpj_proprietario'] = $linha['pedido_de_placa_cpf_cnpj_proprietario']; 
        $registro['pedido_de_placa_cor_placa'] = $linha['pedido_de_placa_cor_placa'];
        $registro['pedido_de_placa_tipo_placa'] = $linha['pedido_de_placa_tipo_placa'];
    }  

}

$form_open = '<form action="pedido-de-placa-salvar.php" method="post">';

echo $form_open;

echo open_table;

require_once 'pedido-de-placa-formulario.php';

$submit = '<input type="submit" value="Salvar">';

echo open_tr . open_td . $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;