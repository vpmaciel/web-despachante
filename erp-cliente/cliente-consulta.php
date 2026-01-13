<?php

// ARQUIVO PARA CONSULTA AJAX

header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');

require_once '../lib/lib-sessao.php';

require_once '../lib/lib-biblioteca.php';

require_once 'cliente-dao.php';

try {    
    $cpfCnpjCliente  = $_POST['servico_cpf_cnpj_cliente'];        
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT cliente_nome_completo FROM cliente WHERE cliente_cpf_cnpj = :servico_cpf_cnpj_cliente";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':servico_cpf_cnpj_cliente', $cpfCnpjCliente);
    $stmt->execute();

    // Obtenção dos resultados como array associativo
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Enviar os resultados como JSON para a requisição Ajax
    echo json_encode($result);    
} catch (PDOException $e) {
    echo json_encode(["error" => "Erro na conexão com o banco de dados: " . $e->getMessage()]);
}
