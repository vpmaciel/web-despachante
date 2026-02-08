<?php

require_once '../lib/lib-biblioteca.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$usuario_nome  = strtoupper(trim($_POST['usuario_nome'] ?? ''));
$usuario_senha = strtoupper(trim($_POST['usuario_senha'] ?? ''));

$usuarioDAO = new UsuarioDAO();
$conexao = new Conexao();
$pdo = $conexao->getPdo();

/* Cria ADMIN se não houver usuários */
if ($usuarioDAO->getRegistros() == 0) {
    $sql = "INSERT INTO usuario (usuario_nome, usuario_senha)
            VALUES ('ADMIN', :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':senha', password_hash('ADMIN', PASSWORD_DEFAULT));
    $stmt->execute();
}

/* Validação do login */
$sql = "SELECT usuario_id, usuario_senha 
        FROM usuario 
        WHERE usuario_nome = :usuario_nome";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':usuario_nome', $usuario_nome);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

if ($dados && password_verify($usuario_senha, $dados['usuario_senha'])) {

    setcookie('usuario_nome', $usuario_nome, time() + 3600, '/', '', false, true);

    header('Location: ../erp-msg/sucesso.php?msg=Login realizado com sucesso!');
    exit;
} else {
    header('Location: ../erp-msg/erro.php?msg=Usuário ou senha incorretos!');
    exit;
}
