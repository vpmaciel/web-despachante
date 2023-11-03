<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function paginar( string $CHAR_TABELA, array $ARRAY_CONDICAO, $PAGINA_PRIMEIRO_RESULTADO = 1, $RESULTADOS_POR_PAGINA = 1 ) {
    
    global $pdo;
    
    if(!is_array($ARRAY_CONDICAO) || !is_string($CHAR_TABELA)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
        //return NULL;
    }

    $CHAR_CONDICAO = '';
    $TAMANHO_ARRAY_CONDICAO = 0;
    $TAMANHO_ARRAY_CONDICAO = count ($ARRAY_CONDICAO);
    
    $CONTADOR = 1;   
    $CLAUSULA_WHERE = 0;    

    try {
        if($TAMANHO_ARRAY_CONDICAO > 0) {
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
                //exit($VALOR);
                if($VALOR != "''"){
                    $CLAUSULA_WHERE = 1;
                    $CHAR_CONDICAO .= $CHAVE . "=" . $VALOR;

                    if($CONTADOR < $TAMANHO_ARRAY_CONDICAO - 1) {
                        $CHAR_CONDICAO .= ' AND ';
                    }
                }

                
                $CONTADOR++;
            }
        }

        
        $STMT = NULL;
        
        if ($CLAUSULA_WHERE != 0) {
            //die("SELECT * FROM $CHAR_TABELA WHERE ($CHAR_CONDICAO);");            
            $STMT = "SELECT * FROM $CHAR_TABELA WHERE $CHAR_CONDICAO LIMIT " . $PAGINA_PRIMEIRO_RESULTADO . ',' . $RESULTADOS_POR_PAGINA . ';--';     
            
        } else {                        
            $STMT = "SELECT * FROM $CHAR_TABELA LIMIT " . $PAGINA_PRIMEIRO_RESULTADO . ',' . $RESULTADOS_POR_PAGINA . ';--';
        }      
        //die($STMT);
        return $STMT;
    
    } catch(PDOException $pdoException) {           
        throw new PDOException($pdoException);    
        echo "Erro na seleção:" . $pdoException->getMessage();
        return NULL;
    }
}
