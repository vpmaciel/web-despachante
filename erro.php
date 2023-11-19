<?php
require_once 'lib/lib-retornar-html.php';

setlocale(LC_ALL, 'pt_BR.utf8');

echo doctype;
echo open_html;
echo open_head;

require_once 'cabecalho.php';

echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

echo open_table;

$input = '<input type="hidden">';
echo open_tr . open_td. $input . close_td . close_tr;

echo close_table;

echo '<span class="erro">' . 'Operação não realizada !'. '</span>';

if (isset($_GET['msg'])) {
    echo '<br><br><span class="erro">' . $_GET['msg']. '</span>';
}

$msg = '<script>setTimeout(function() { window.history.back(); }, 180000);</script>';
echo $msg;

echo close_div;

echo close_body;
	
echo close_html;