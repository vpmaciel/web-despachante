<?php


setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib-biblioteca.php';

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';

echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

$form_open = '<form action="" method="POST">';

echo $form_open;

echo open_table;

echo open_tr . open_th . 'Veículo'  . close_th . close_tr; 

require_once 'veiculo-menu.php';

echo open_td . $LINK . close_td . close_tr;

ob_start();
include 'veiculo-grafico.php';
$msg = ob_get_clean();

echo open_tr . open_td . open_label . '&nbsp;' . close_lable . close_td . close_tr; 

echo open_tr . '<td style="text-align: center;">' . open_label . $msg . close_lable . close_td . close_tr; 

echo close_table;

echo close_form;

echo close_div;

echo close_body;
	
echo close_html;    