<?php


require_once 'lib/lib-sessao.php';
require_once 'lib/lib-biblioteca.php';

try {
    $cpfCnpjCliente  = $_POST['servico_cpf_cnpj_cliente'];    
    // Criação da conexão usando PDO
        // Configuração do PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Execução da consulta SQL
       // Execução da consulta SQL
       $sql = "SELECT cliente_nome_completo FROM cliente WHERE cliente_cpf_cnpj = :servico_cpf_cnpj_cliente";
       $stmt = $pdo->prepare($sql);
       $stmt->bindParam(':servico_cpf_cnpj_cliente', $cpfCnpjCliente);
       $stmt->execute();

    // Obtenção dos resultados como array associativo
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Enviar os resultados como JSON para a requisição Ajax
    echo json_encode($result);
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
