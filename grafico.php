
<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

# $Id$
# PHPlot Example: Pie/text-data-single
require_once 'lib/lib-biblioteca.php';
//Define o objeto
//create a PHPlot object with 800x600 pixel image
$plot = new PHPlot(400,300);
//Define some data
$example_data = array(
 array('1',3),
 array('2',5),
 array('3',7),
 array('4',8),
 array('5',2),
 array('6',6),
 array('7',7),
 array('8',7),
 array('9',7),
 array('10',7),
 array('11',7),
 array('12',7),
);
$plot->setDataValues($example_data);
//set titles
$plot->setTitle("A Simple Plot\nMade with PHPlot");
$plot->setXTitle('Mes');
$plot->setYTitle('Itens Vendidos');
//Turn off X axis ticks and labels because they get in the way:
$plot->setXTickLabelPos('none');
$plot->setXTickPos('none');
//Draw it
$plot->setIsInline(true);
$plot->setOutputFile("test.png");

$plot->DrawGraph();

echo '<img class="graph" src="test.png" alt="Plot Image">';
