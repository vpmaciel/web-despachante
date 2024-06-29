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

echo open_div_main;

require_once 'menu.php';

$registro = array();
$registro['cliente_id'] = '';
$registro['cliente_nome_completo'] = '';
$registro['cliente_cpf_cnpj'] = '';
$registro['cliente_telefone'] = '';
$registro['cliente_email'] = '';

$numero_de_registros = retornar_total_registros('cliente');

if (!isset($_GET['cliente_id'])) {
    $registro['cliente_id'] = '';
}

if (isset($_GET['editar'])) {

    $SQL="SELECT * FROM cliente where cliente_id = '" . $_GET['cliente_id'] . "';" ;
    $stmt = $pdo->prepare($SQL);
    $stmt->execute();
    
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $registro['cliente_id'] = $linha['cliente_id'];
        $registro['cliente_cpf_cnpj'] = $linha['cliente_cpf_cnpj'];
        $registro['cliente_telefone'] = $linha['cliente_telefone']; 
        $registro['cliente_nome_completo'] = $linha['cliente_nome_completo'];
        $registro['cliente_email'] = $linha['cliente_email'];        
    }  
}
   
$form_open = '<form action="cliente-salvar.php" method="POST">';

echo $form_open;

require_once 'cliente-formulario.php';

echo close_form;

echo '<script src="cliente-cadastro.ts"></script>';

echo close_div;

echo close_body;
	
echo close_html;