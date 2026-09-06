<?php
echo '<div class="menu">';
echo '<a id="home" href="../erp-home/home.php" class="menu_a">Home</a>';
echo '<a id="cliente" href="../erp-cliente/cliente-cadastro.php" class="menu_a">Cliente</a>';
echo '<a id="pedido-de-placa" href="../erp-pedido-de-placa/pedido-de-placa-cadastro.php" class="menu_a">Pedido de Placa</a>';
echo '<a id="servico" href="../erp-servico/servico-cadastro.php" class="menu_a">Serviço</a>';
echo '<a id="veiculo" href="../erp-veiculo/veiculo-cadastro.php" class="menu_a">Veículo</a>';
echo '</div>';    

echo '<div id="statusUsuario">';
echo '<script>';
echo 'const usuarioNome = ' . (isset($_SESSION['usuario_nome']) ? json_encode($_SESSION['usuario_nome']) : 'null') . ';';
echo '</script>';
echo '</div>';

echo open_h1 . 'Login' . close_h1;

$_SESSION['ultimo_acesso'] = time();

// Se não estiver na página de sucesso nem na de erro, salva a URL atual na sessão
if (!str_contains($_SERVER['PHP_SELF'], 'sucesso') && !str_contains($_SERVER['PHP_SELF'], 'erro')) {
    $_SESSION['url'] = $_SERVER['PHP_SELF'];
}
    

