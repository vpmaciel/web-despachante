<?php
function retornar_total_registros(string $string_tabela) : int {
    global $pdo;
    try {
    
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM $string_tabela;--");
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