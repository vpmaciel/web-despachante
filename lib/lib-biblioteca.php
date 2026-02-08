<?php
// Produção
//error_reporting(E_ERROR | E_PARSE);
//error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

// Desenvolvimento
error_reporting(E_ALL & ~E_DEPRECATED);
date_default_timezone_set('America/Sao_Paulo');
require_once '../fpdf/fpdf.php';
require_once '../cookie/cookie.php';
require_once '../componentes/pdf.php';
require_once '../erp-dao/dao.php';
require_once '../sql/sql.php';
require_once 'lib-remover-acentos.php';
require_once 'lib-retornar-html.php';
require_once 'lib-remover-caracteres.php';
require_once 'lib-formatar-dados.php';
require_once 'lib-string.php';
require_once 'lib-formatar-numero.php';
require_once '../sql/sql-conexao.php';
require_once '../relatorio.php';
require_once '../erp-login/usuario-dao.php';
require_once '../erp-cliente/cliente-dao.php';
require_once '../erp-pedido-de-placa/pedido-de-placa-dao.php';
require_once '../erp-veiculo/veiculo-dao.php';
require_once '../erp-servico/servico-dao.php';
