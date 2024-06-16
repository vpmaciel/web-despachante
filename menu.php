<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
echo '<div class="menu">';
echo  '<a href="index.php" class="menu_a">Home</a> '; 
echo  '<a href="cliente-cadastro.php" class="menu_a">Cliente</a> '; 
echo  '<a href="pedido-de-placa-cadastro.php" class="menu_a">Pedido de Placa</a> '; 
echo  '<a href="servico-cadastro.php" class="menu_a">Serviço</a> '; 
echo  '<a href="veiculo-cadastro.php" class="menu_a">Veículo</a>'; 
echo '</div><br>';

require_once 'rodape.php';

echo '<br>';
