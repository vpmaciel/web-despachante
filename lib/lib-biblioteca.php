<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

require_once 'phplot.php';
require_once 'sql/sql.php';
require_once 'lib-remover-acentos.php';
require_once 'lib-retornar-html.php';
require_once 'lib-remover-caracteres.php';
require_once 'lib-formatar-dados.php';
require_once 'lib-string.php';
require_once 'lib-formatar-cpf-cnpj.php';
require_once 'lib-formatar-numero.php';
require_once 'fpdf/fpdf.php';

require_once 'usuario-dao.php';