<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function retornar_total_registros(string $char_tabela) : int {
    global $PDO;
    try {
    
        $stmt = $PDO->prepare("SELECT COUNT(*) FROM $char_tabela;--");
        if (!$stmt->execute()) {
            return 0;
        }
        $numero_registros = $stmt->fetchColumn(); 
        return $numero_registros;    
    } catch(PDOException $pdoException) {           
        throw new PDOException($pdoException);    
        echo "Erro na inserção:" . $pdoException->getMessage();
        return 0;
    }
}