<?php
// ENDPOINT AJAX – NÃO PODE GERAR HTML

header('Content-Type: application/json; charset=utf-8');

require_once '../sql/sql-conexao.php';

$conexao = new Conexao();
$pdo = $conexao->getPdo();

try {
    // Recebe o CPF/CNPJ    
    if (isset($_POST['servico_cpf_cnpj_cliente'])) {
        $cpfCnpj = $_POST['servico_cpf_cnpj_cliente'] ?? '';
    }

    if (isset($_POST['cliente_cpf_cnpj'])) {
        $cpfCnpj = $_POST['cliente_cpf_cnpj'] ?? '';
    }

    if ($cpfCnpj === '') {
        echo json_encode([]);
        exit;
    }

    $sql = "SELECT cliente_nome_completo
            FROM cliente
            WHERE cliente_cpf_cnpj = :cpf
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cpf', $cpfCnpj, PDO::PARAM_STR);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($resultado ?: []);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno']);
}
