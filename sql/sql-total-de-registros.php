<?php
function retornar_total_registros(string $CHAR_TABELA) : int {
    global $PDO;
    try {
    
        $STMT = $PDO->prepare("SELECT COUNT(*) FROM $CHAR_TABELA;--");
        if (!$STMT->execute()) {
            return 0;
        }
        $NUMERO_REGISTROS = $STMT->fetchColumn(); 
        return $NUMERO_REGISTROS;    
    } catch(PDOException $pdoException) {           
        throw new PDOException($pdoException);    
        echo "Erro na inserção:" . $pdoException->getMessage();
        return 0;
    }
}