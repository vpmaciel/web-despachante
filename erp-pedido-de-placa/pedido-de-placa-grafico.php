
<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

require_once '../lib/lib-biblioteca.php';

$conexao = new Conexao();

$totalRegistros = $conexao->getTotalRegistros('pedido_de_placa');

$dados = array(array('Qtde', $totalRegistros));

$grafico = new PHPlot(400, 400);
$grafico->setImageBorderType('plain');
$grafico->setPlotType('bars');
$grafico->setDataType('text-data');
$grafico->setDataValues($dados);
$grafico->setTitle(converterParaUTF_8("Pedidos de Placas"));  

# Turn off X tick labels and ticks because they don't apply here:
$grafico->setXTickLabelPos('none');
$grafico->setXTickPos('none');

# Make sure Y=0 is displayed:
$grafico->setPlotAreaWorld(NULL, 0);
# Y Tick marks are off, but Y Tick Increment also controls the Y grid lines:
$grafico->setYTickIncrement(100);

# Turn on Y data labels:
$grafico->setYDataLabelPos('plotin');

# With Y data labels, we don't need Y ticks or their labels, so turn them off.
$grafico->setYTickLabelPos('none');
$grafico->setYTickPos('none');

# Format the Y Data Labels as numbers with 1 decimal place.
# Note that this automatically calls setYLabelType('data').
$grafico->setPrecisionY(0);

#Exibimos o gráfico
//Draw it
$grafico->setIsInline(true);
$grafico->setOutputFile("pedido-de-placa.png");
$grafico->DrawGraph(400,400);
echo '<img src="pedido-de-placa.png" width="400px" height="400px">';