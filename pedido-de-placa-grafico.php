
<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

require_once 'lib/lib-biblioteca.php';

$DADOS = array(array('Qtde', retornar_total_registros('PEDIDO_DE_PLACA')));

$GRAFICO = new PHPlot(400, 400);
$GRAFICO->setImageBorderType('plain');
$GRAFICO->setPlotType('bars');
$GRAFICO->setDataType('text-data');
$GRAFICO->setDataValues($DADOS);
$GRAFICO->setTitle(converterParaUTF_8("Pedidos de Placas"));  

# Turn off X tick labels and ticks because they don't apply here:
$GRAFICO->setXTickLabelPos('none');
$GRAFICO->setXTickPos('none');

# Make sure Y=0 is displayed:
$GRAFICO->setPlotAreaWorld(NULL, 0);
# Y Tick marks are off, but Y Tick Increment also controls the Y grid lines:
$GRAFICO->setYTickIncrement(100);

# Turn on Y data labels:
$GRAFICO->setYDataLabelPos('plotin');

# With Y data labels, we don't need Y ticks or their labels, so turn them off.
$GRAFICO->setYTickLabelPos('none');
$GRAFICO->setYTickPos('none');

# Format the Y Data Labels as numbers with 1 decimal place.
# Note that this automatically calls setYLabelType('data').
$GRAFICO->setPrecisionY(0);

#Exibimos o gráfico
//Draw it
$GRAFICO->setIsInline(true);
$GRAFICO->setOutputFile("plot.png");
$GRAFICO->DrawGraph(400,400);
echo '<img src="plot.png" width="400px" height="400px">';