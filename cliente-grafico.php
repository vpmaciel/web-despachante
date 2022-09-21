
<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

# $Id$
# PHPlot Example: Pie/text-data-single
require_once 'lib/lib-biblioteca.php';
  $data = array(
    array('Qtde', 1306.31)
  );
  
  $plot = new PHPlot(400, 400);
  $plot->SetImageBorderType('plain');
  $plot->SetPlotType('bars');
  $plot->SetDataType('text-data');
  $plot->SetDataValues($data);
  $plot->SetTitle(utf8_decode("Clientes"));  
  
  # Turn off X tick labels and ticks because they don't apply here:
  $plot->SetXTickLabelPos('none');
  $plot->SetXTickPos('none');
  
  # Make sure Y=0 is displayed:
  $plot->SetPlotAreaWorld(NULL, 0);
  # Y Tick marks are off, but Y Tick Increment also controls the Y grid lines:
  $plot->SetYTickIncrement(100);
  
  # Turn on Y data labels:
  $plot->SetYDataLabelPos('plotin');
  
  # With Y data labels, we don't need Y ticks or their labels, so turn them off.
  $plot->SetYTickLabelPos('none');
  $plot->SetYTickPos('none');
  
  # Format the Y Data Labels as numbers with 1 decimal place.
  # Note that this automatically calls SetYLabelType('data').
  $plot->SetPrecisionY(2);
 
#Exibimos o gráfico
//Draw it
$plot->SetIsInline(True);
$plot->SetOutputFile("plot.png");
$plot->DrawGraph(400,400);
echo '<img src="plot.png" width="400px" height="400px">';