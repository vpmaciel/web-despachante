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

echo open_table;

echo open_tr . open_th . 'Cliente'  . close_th . close_tr; 

require_once 'cliente-menu.php';

echo open_tr . open_td . $LINK . close_td . close_tr;

echo open_tr . open_td. open_label . 'Nome' . close_lable . close_td . close_tr; 

$input = '<input type="hidden" id="cliente_id" name="cliente_id" maxlength="50" value="' . $registro['cliente_id'] .'">';

echo $input;

$input = '<input type="text" id="cliente_nome_completo" name="cliente_nome_completo" maxlength="50" value="' . $registro['cliente_nome_completo'] .'">';

echo open_td . $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'CPF | CNPJ' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="cliente_cpf_cnpj" name="cliente_cpf_cnpj" minlength="14" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" onblur="clearTimeout();" value="' . $registro['cliente_cpf_cnpj'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'Telefone' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="cliente_telefone" name="cliente_telefone" maxlength="15" onkeypress="mask(this, mphone);" value="' . $registro['cliente_telefone'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . 'E-Mail' . close_lable . close_td . close_tr; 

$input = '<input type="text" id="cliente_email" name="cliente_email" maxlength="100"  value="' . $registro['cliente_email'] .'">';

echo open_tr . open_td. $input . close_td . close_tr;

echo open_tr . open_td. open_label . $numero_de_registros . ' registros cadastrados' . close_lable . close_td . close_tr; 

$submit = '<input type="submit" value="Salvar">';

echo open_tr . open_td. $submit . close_td . close_tr;

echo close_table;

echo close_form;

echo '<script src="cliente-cadastro.ts"></script>';

echo close_div;

echo close_body;
	
echo close_html;