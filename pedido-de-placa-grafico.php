
<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

require_once 'lib/lib-biblioteca.php';

$DADOS = array(array('Qtde', retornar_total_registros('PEDIDO_DE_PLACA')));

$GRAFICO = new PHPlot(400, 400);
$GRAFICO->SetImageBorderType('plain');
$GRAFICO->SetPlotType('bars');
$GRAFICO->SetDataType('text-data');
$GRAFICO->SetDataValues($DADOS);
$GRAFICO->SetTitle(converterParaUTF_8("Pedidos de Placas"));  

# Turn off X tick labels and ticks because they don't apply here:
$GRAFICO->SetXTickLabelPos('none');
$GRAFICO->SetXTickPos('none');

# Make sure Y=0 is displayed:
$GRAFICO->SetPlotAreaWorld(NULL, 0);
# Y Tick marks are off, but Y Tick Increment also controls the Y grid lines:
$GRAFICO->SetYTickIncrement(100);

# Turn on Y data labels:
$GRAFICO->SetYDataLabelPos('plotin');

# With Y data labels, we don't need Y ticks or their labels, so turn them off.
$GRAFICO->SetYTickLabelPos('none');
$GRAFICO->SetYTickPos('none');

# Format the Y Data Labels as numbers with 1 decimal place.
# Note that this automatically calls SetYLabelType('data').
$GRAFICO->SetPrecisionY(0);

#Exibimos o gráfico
//Draw it
$GRAFICO->SetIsInline(True);
$GRAFICO->SetOutputFile("plot.png");
$GRAFICO->DrawGraph(400,400);
echo '<img src="plot.png" width="400px" height="400px">';