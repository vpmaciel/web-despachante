<?php
session_start();

setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib-biblioteca.php';

echo doctype;

echo open_html;

echo open_head;

require_once 'cabecalho.php';

echo close_head;

echo open_body;

echo open_div_main;

require_once 'menu.php';

echo open_table;

$details["Value"] = "1.5";
$n = number_format($details["Value"], 2, ",", ".");
$details["Value"] = "1,5";
$e = number_format(str_replace(",",".",str_replace(".","",$details["Value"])), 2, '.', '');

//$myDateTime = DateTime::createFromFormat('Y-m-d', $dateString);
//$newDateString = $myDateTime->format('m/d/Y');

//$ymd = DateTime::createFromFormat('m-d-Y', '10-16-2003')->format('Y-m-d');


$var = '20/04/2012';
$date = str_replace('/', '-', $var);
//echo date('Y-m-d', strtotime($date));
//echo '<br>';
$date = '2020-04-20';
//echo date('d-m-Y', strtotime($date));

echo open_tr . open_th . 'Web Despachante'  . close_th . close_tr; 

//echo open_tr . open_td. open_label . $n . close_lable . close_td . close_tr; 
//echo open_tr . open_td. open_label . $e . close_lable . close_td . close_tr; 

$msg = '<p>Descubra a solução perfeita para otimizar a gestão da sua empresa! Nosso software inteligente é a ferramenta que você precisa para automatizar processos, gerenciar projetos e equipes, e ter acesso a relatórios precisos e atualizados em tempo real.';

$msg .= ' Com nossa tecnologia de ponta, você pode ter certeza de que está escolhendo a melhor solução para o seu negócio. Nosso software é personalizável e fácil de usar, permitindo que você tenha uma gestão mais eficiente e livre de burocracias.';

$msg .= ' Além disso, com nosso suporte técnico especializado, você nunca estará sozinho. Estamos sempre disponíveis para ajudá-lo com qualquer dúvida ou problema que surgir, garantindo que você tenha um atendimento rápido e eficiente.';

$msg .= ' Não perca mais tempo com processos manuais e desorganizados. Invista em nosso software e veja como sua empresa pode crescer ainda mais. Entre em contato conosco e descubra como podemos ajudá-lo!</p>';
echo open_tr . open_td. $msg  . close_td . close_tr;

echo close_table;

echo '<br>';

$msg = 'Verig &reg;<br><br>';

echo $msg; 

$msg = 'vpmaciel@gmail.com<br>';

echo $msg; 

//$comando = escapeshellcmd('main.py');
//$cmdResult = shell_exec($comando);
//echo $cmdResult;

echo close_div;

echo close_body;
	
echo close_html;    