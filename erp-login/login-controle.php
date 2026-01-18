<script>
    document.cookie = "cookieConsent=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/";
    document.cookie = "usuario_nome=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/";
</script>
<?php
if (isset($_COOKIE['usuario_nome'])) {
    // Destruir o cookie 'cookieConsent'
    setcookie('cookieConsent', '', time() - 3600, '/');
    setcookie('usuario_nome', '', time() - 3600, '/');
    unset($_COOKIE['usuario_nome']);

    // Verificar se o cookie foi destruído
    if (!isset($_COOKIE['usuario_nome'])) {
        header('location: ../erp-msg/sucesso.php?msg=Sessão encerrada com sucesso!');
    } else {
        header('location:../index.php');
        exit;
    }
    exit;
}
session_start();
require_once '../lib/lib-biblioteca.php';

$usuario_nome = strtoupper(trim($_POST['usuario_nome']));
$usuario_senha = strtoupper(trim($_POST['usuario_senha']));

// Exibe para depuração o nome do usuário que foi passado
//echo "Nome do usuário: " . $usuario_nome;

// Verifica se não há usuários na tabela, caso não exista, cria o usuário ADMIN.
$usuarioDAO = new UsuarioDAO();
$total_registro = $usuarioDAO->getRegistros();
$conexao = new Conexao();
$pdo = $conexao->getPdo();

if ($total_registro == 0) {

    try {
        // Definição do usuário padrão
        $usuario_padrao = [
            'usuario_nome' => 'ADMIN',
            'usuario_senha' => password_hash('ADMIN', PASSWORD_DEFAULT)
        ];

        // Preparar a query SQL
        $sql = "INSERT INTO usuario (usuario_nome, usuario_senha) VALUES (:usuario_nome, :usuario_senha)";
        $stmt = $pdo->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':usuario_nome', $usuario_padrao['usuario_nome'], PDO::PARAM_STR);
        $stmt->bindParam(':usuario_senha', $usuario_padrao['usuario_senha'], PDO::PARAM_STR);

        // Executar a query
        $stmt->execute();
    } catch (PDOException $e) {
        exit("Erro ao inserir usuário: " . $e->getMessage());
    }
}

// Verifica o login do usuário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "SELECT usuario_id, usuario_senha FROM usuario WHERE usuario_nome = :usuario_nome";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario_nome', $usuario_nome, PDO::PARAM_STR);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        exit("Erro: " . $e->getMessage());
    }

    if ($dados && password_verify($usuario_senha, $dados["usuario_senha"])) {
        //$_SESSION["usuario"] = $usuario_nome;
        if (isset($_COOKIE['usuario_nome'])) {
            setcookie('usuario_nome', '', time() - 3600, '/');
            unset($_COOKIE['usuario_nome']);
        }

        setcookie('usuario_nome', $usuario_nome, time() + 3600, '/');
        header('location: ../erp-msg/sucesso.php?msg=Login realizado com sucesso!');
        exit;
    } else {
        header('location: ../erp-msg/erro.php?msg=E-mail ou Senha incorretos!');
        exit;
    }
}
