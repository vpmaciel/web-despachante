<?php
require_once '../lib/lib-biblioteca.php';

echo doctype;

echo open_html;

echo open_head;

require_once '../cabecalho.php';

echo close_head;

echo open_body;

echo open_div;

require_once '../menu.php';

if (isset($_GET['msg'])) {
    echo '<br><br><span class="erro">' . $_GET['msg']. '</span>';
} else {
    echo '<br><span class="erro">' . 'Operação não realizada !'. '</span>';
}

echo close_div;

echo close_body;
	
echo close_html;