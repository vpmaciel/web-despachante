    <?php
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);    
    echo '<div class="site">';    
    echo  open_h1 . 'ATHOS DESPACHANTE' .  "&copy; " . date("Y") . close_h1;     
    echo '</div>';    
    echo '<div class="menu">';
    echo  '<a id="home" href="home.php" class="menu_a">Home</a> '; 
    echo  '<a id="cliente" href="cliente-cadastro.php" class="menu_a">Cliente</a> '; 
    echo  '<a id="pedido-de-placa" href="pedido-de-placa-cadastro.php" class="menu_a">Pedido de Placa</a> '; 
    echo  '<a id="servico" href="servico-cadastro.php" class="menu_a">Serviço</a> '; 
    echo  '<a id="veiculo" href="veiculo-cadastro.php" class="menu_a">Veículo</a>'; 
    echo '</div>';

    require_once 'cookies.php';
