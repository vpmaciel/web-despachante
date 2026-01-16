<?php
// ENDPOINT AJAX – NÃO PODE GERAR HTML

header('Content-Type: application/json; charset=utf-8');

require_once '../sql/sql-conexao.php';

$conexao = new Conexao();
$pdo = $conexao->getPdo();

try {
    // Recebe o CPF/CNPJ de qualquer origem
    $cpfCnpj =
        $_POST['servico_cpf_cnpj_cliente']
        ?? $_POST['cliente_cpf_cnpj']
        ?? '';

    if ($cpfCnpj === '') {
        echo json_encode(['a'=>'1']);
        exit;
    }

    $sql = "SELECT cliente_nome
            FROM cliente
            WHERE cliente_cpf_cnpj = :cpf
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cpf', $cpfCnpj, PDO::PARAM_STR);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($resultado ?: []);
} catch (Throwable $e) {
    echo json_encode([
        'erro'   => $e->getMessage(),
        'arquivo' => $e->getFile(),
        'linha'  => $e->getLine()
    ]);
}
