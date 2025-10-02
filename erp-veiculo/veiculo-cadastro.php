<?php


require_once 'lib/lib-sessao.php';

require_once 'lib/lib-biblioteca.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once 'menu.php';

require_once 'veiculo-menu.php';

$registro = array();

$registro['veiculo_id'] = '';
$registro['veiculo_placa'] = '';
$registro['veiculo_cpf_cnpj_proprietario'] = ''; 
$registro['veiculo_nome_proprietario'] = '';     
$registro['veiculo_marca'] = '';     
$registro['veiculo_modelo'] = '';             

$numero_de_registros = retornar_total_registros('veiculo');

$form_open = '<form action="veiculo-salvar.php" method="POST">';

if (!isset($_GET['veiculo_id'])) {
    $registro['veiculo_id'] = '';
}

if (isset($_GET['editar'])) {

    $SQL="SELECT * FROM veiculo where veiculo_id = '" . $_GET['veiculo_id'] . "';" ;
    $stmt = $pdo->prepare($SQL);
    $stmt->execute();
    
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $registro['veiculo_id'] = $linha['veiculo_id'];
        $registro['veiculo_placa'] = $linha['veiculo_placa'];
        $registro['veiculo_cpf_cnpj_proprietario'] = $linha['veiculo_cpf_cnpj_proprietario']; 
        $registro['veiculo_nome_proprietario'] = $linha['veiculo_nome_proprietario'];     
        $registro['veiculo_marca'] = $linha['veiculo_marca'];     
        $registro['veiculo_modelo'] = $linha['veiculo_modelo'];             
    }  

}
   

echo $form_open;

require_once 'veiculo-formulario.php';

echo close_form;

echo close_div;

require_once 'rodape.php';

echo close_body;
	
echo close_html;