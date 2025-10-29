    <?php
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);      
    echo '<div class="menu">';     
    echo '<a id="home" href="../home/home.php" class="menu_a">Home</a>';
    echo '<a id="cliente" href="../erp-cliente/cliente-cadastro.php" class="menu_a">Cliente</a> '; 
    echo '<a id="pedido-de-placa" href="../erp-pedido-de-placa/pedido-de-placa-cadastro.php" class="menu_a">Pedido de Placa</a>';
    echo '<a id="servico" href="../erp-servico/servico-cadastro.php" class="menu_a">Serviço</a> '; 
    echo '<a id="veiculo" href="../erp-veiculo/veiculo-cadastro.php" class="menu_a">Veículo</a>'; 
    echo '</div>';
    echo  open_h1 . 'Athos Despachante' .  " &copy; " . date("Y") . close_h1;     
    require_once 'cookies.php';
