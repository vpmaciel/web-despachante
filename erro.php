<?php
session_start();

setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib-biblioteca.php';

echo DOCTYPE;
echo HTML_OPEN;
echo HEAD_OPEN;

require_once 'cabecalho.php';

echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

echo DIV_RIGHT;

require_once 'titulo.php';

echo TABLE_OPEN;

$INPUT = '<input type="hidden">';
echo TR_OPEN . TD_OPEN. $INPUT . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo '<span class="erro">' . 'Operação não realizada !'. '</span>';

if (isset($_GET['msg'])) {
    echo '<br><br><span class="erro">' . $_GET['msg']. '</span>';
}

$MSG = '<script>setTimeout(function() { window.history.back(); }, 180000);</script>';
echo $MSG;

echo DIV_CLOSE;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;