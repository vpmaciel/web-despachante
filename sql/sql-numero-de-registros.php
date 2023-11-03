<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function retornar_NUMERO_REGISTROS(string $CHAR_TABELA, array $ARRAY_CONDICAO) : int {
    global $PDO;
    
    if(!is_string($CHAR_TABELA) || !is_array($ARRAY_CONDICAO)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
        return 0;
    }
    $CHAR_CONDICAO = '';
    $TAMANHO_ARRAY_CONDICAO = count ($ARRAY_CONDICAO);        

    try {
        $contador = 1;
        foreach($ARRAY_CONDICAO as $CHAVE => $VALOR) {
            $VALOR = escapeshellcmd($VALOR);
            
            $VALOR = remover_caracteres($VALOR);
            if (!is_numeric($VALOR)) {
                if (strstr($VALOR, '@') !== false || strstr($VALOR, '.') !== false) {
                    $VALOR = "'".  mb_strtolower( $VALOR, 'UTF-8') . "'";
                } else {
                    $VALOR = "'" . mb_convert_case(mb_strtolower( $VALOR, 'UTF-8'),  MB_CASE_TITLE) . "'";
                }                
            }
               
            $CHAR_CONDICAO .= $CHAVE . "=" . $VALOR;               

            if($contador < $TAMANHO_ARRAY_CONDICAO) {
                $CHAR_CONDICAO .= ' AND ';
            }
            $contador++;
        }
        //exit("SELECT COUNT(*) FROM $CHAR_TABELA WHERE ($CHAR_CONDICAO);");
        $STMT = $PDO->prepare("SELECT COUNT(*) FROM $CHAR_TABELA WHERE ($CHAR_CONDICAO);--");
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

