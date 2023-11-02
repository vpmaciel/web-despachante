<?php
session_start();

setlocale(LC_ALL, 'pt_BR.utf8');

require_once 'lib/lib-biblioteca.php';

echo DOCTYPE;

echo HTML_OPEN;

echo HEAD_OPEN;

require_once 'cabecalho.php';

echo HEAD_CLOSE;

echo BODY_OPEN;

echo DIV_MAIN_OPEN;

require_once 'menu.php';

echo TABLE_OPEN;

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

echo TR_OPEN . TH_OPEN . 'Web Despachante'  . TH_CLOSE . TR_CLOSE; 

//echo TR_OPEN . TD_OPEN. LABEL_OPEN . $n . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 
//echo TR_OPEN . TD_OPEN. LABEL_OPEN . $e . LABEL_CLOSE . TD_CLOSE . TR_CLOSE; 

$MSG = '<p>Descubra a solução perfeita para otimizar a gestão da sua empresa! Nosso software inteligente é a ferramenta que você precisa para automatizar processos, gerenciar projetos e equipes, e ter acesso a relatórios precisos e atualizados em tempo real.';

$MSG .= ' Com nossa tecnologia de ponta, você pode ter certeza de que está escolhendo a melhor solução para o seu negócio. Nosso software é personalizável e fácil de usar, permitindo que você tenha uma gestão mais eficiente e livre de burocracias.';

$MSG .= ' Além disso, com nosso suporte técnico especializado, você nunca estará sozinho. Estamos sempre disponíveis para ajudá-lo com qualquer dúvida ou problema que surgir, garantindo que você tenha um atendimento rápido e eficiente.';

$MSG .= ' Não perca mais tempo com processos manuais e desorganizados. Invista em nosso software e veja como sua empresa pode crescer ainda mais. Entre em contato conosco e descubra como podemos ajudá-lo!</p>';
echo TR_OPEN . TD_OPEN. $MSG  . TD_CLOSE . TR_CLOSE;

echo TABLE_CLOSE;

echo '<br>';

$MSG = 'Verig &reg;<br><br>';

echo $MSG; 

$MSG = 'vpmaciel@gmail.com<br>';

echo $MSG; 

//$comando = escapeshellcmd('main.py');
//$cmdResult = shell_exec($comando);
//echo $cmdResult;

echo DIV_CLOSE;

echo BODY_CLOSE;
	
echo HTML_CLOSE;    