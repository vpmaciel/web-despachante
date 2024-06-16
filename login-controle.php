<?php


// Carregue a biblioteca PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Configurações do servidor SMTP do Gmail
$smtpHost = 'smtp.gmail.com';
$smtpPort = 587;
$smtpUsuario = 'vpmaciel@gmail.com';
$smtpSenha = 'zbxwblqlcfqzfjaa';

// Informações do destinatário e assunto
$para = "vpmaciel@live.com";
$assunto = "Assunto do E-mail";

// Mensagem do E-mail
$mensagem = "Olá,\n\nIsso é uma mensagem de exemplo.";

// Crie uma instância do PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurações do servidor SMTP
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsuario;
    $mail->Password = $smtpSenha;
    $mail->SMTPSecure = 'tls';
    $mail->Port = $smtpPort;

    // Configurações adicionais
    $mail->setFrom($smtpUsuario, 'Seu Nome');
    $mail->addAddress($para);
    $mail->Subject = $assunto;
    $mail->Body = $mensagem;

    // Enviar E-mail
    $mail->send();
    echo "E-mail enviado com sucesso!";
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
}

require_once 'lib/lib-biblioteca.php';

$USUARIO = array();
$USUARIO['usuario_email'] = trim($_POST['usuario_email']);
$USUARIO['usuario_senha'] = trim($_POST['usuario_senha']);

$usuario_email = array ('usuario_email' =>$USUARIO['usuario_email']);

$registroS = retornar_numero_registros('USUARIO', $usuario_email);

if ($registroS == 0) {
	header('location: erro.php?msg=E-mail ou Senha incorretos !');
	exit;
} else {	

	if (!isset($_COOKIE['usuario_email'])) {
		$USUARIO_JSON = json_decode(selecionar('USUARIO', $usuario_email));	
		
		foreach($USUARIO_JSON as $registro) {			
            setcookie('usuario_email', $registro->usuario_email, time() + 365 * 24 * 60 * 60, '/');
		}		
		header('location: sucesso.php?msg=Sessão criada com sucesso !');
		exit;
	} else {		
		header('location: erro.php?msg=Usuário já está logado !');
		exit;
	}
}
