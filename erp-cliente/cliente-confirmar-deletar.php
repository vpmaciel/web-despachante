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

$SQL = '';

$registro['cliente_id'] = $_GET['cliente_id'];

try {    
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM cliente WHERE cliente_id = :cliente_id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':cliente_id', $registro['cliente_id']);
  $stmt->execute();

} catch (PDOException $e) {
  exit("Erro: " . $e->getMessage());
}

echo open_table_3;

$cliente_id = 0;

while($linha = $stmt->fetch(PDO::FETCH_ASSOC))
{
    	
  $string= '';
	foreach ($linha as $chave=>$valor){ 
		$string.= "$chave" . "=" . $valor . "&";                        
	}
  echo open_tr . open_td_2 . 'CPF | CNPJ: ' . close_td . open_td . $linha['cliente_cpf_cnpj'] . close_td . close_tr;
  echo open_tr . open_td_2 . 'TELEFONE: ' . close_td . open_td . $linha['cliente_telefone'] . close_td . close_tr;
  echo open_tr . open_td_2 . 'NOME COMPLETO: ' . close_td . open_td . $linha['cliente_nome_completo'] . close_td . close_tr;
  echo open_tr . open_td_2 . 'E-MAIL: ' . close_td . open_td . $linha['cliente_email'] . close_td . close_tr;
  echo open_tr . open_td_2 .'&nbsp;' . close_td. open_td_2 . '&nbsp;' . close_td. close_tr; 
  $cliente_id = $linha['cliente_id'];
}
echo close_table;

echo '<a href="cliente-deletar.php?cliente_id=' . $cliente_id . '">Excluir</a>';   

echo close_div;

require_once 'rodape.php';

echo close_body;
	
echo close_html;
