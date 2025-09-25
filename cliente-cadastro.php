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

require_once 'cliente-menu.php';

$registro = array();
$registro['cliente_id'] = '';
$registro['cliente_nome_completo'] = '';
$registro['cliente_cpf_cnpj'] = '';
$registro['cliente_telefone'] = '';
$registro['cliente_email'] = '';

if (!isset($_GET['cliente_id'])) {
    $registro['cliente_id'] = '';
}

if (isset($_GET['editar'])) {
    try {
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
    } catch (PDOException $e) {
        exit("Erro: " . $e->getMessage());
    }
}
   
$form_open = '<form action="cliente-salvar.php" method="POST">';

echo $form_open;

require_once 'cliente-formulario.php';

echo close_form;

echo close_div;

require_once 'rodape.php';

echo close_body;
	
echo close_html;