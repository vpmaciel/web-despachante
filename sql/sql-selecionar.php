<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function selecionar( string $CHAR_TABELA, array $ARRAY_CONDICAO) {
    
    global $PDO;
    
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

                    if($CONTADOR < $TAMANHO_ARRAY_CONDICAO) {
                        $CHAR_CONDICAO .= ' AND ';
                    }
                }

                
                $CONTADOR++;
            }
        }

        
        $STMT = NULL;
        
        if ($CLAUSULA_WHERE != 0) {
            //die("SELECT * FROM $CHAR_TABELA WHERE ($CHAR_CONDICAO);");
            $STMT = $PDO->prepare("SELECT * FROM $CHAR_TABELA WHERE ($CHAR_CONDICAO);--");
            
        } else {            
            $STMT = $PDO->prepare("SELECT * FROM $CHAR_TABELA;--");
        }

        if (!$STMT->execute()) {
            throw new Exception('Não executou !');            
            return NULL;
        }
        $linhas = $STMT->fetchAll(PDO::FETCH_ASSOC);
        
        if($STMT->rowCount() <= 0) {            
            $STMT->closeCursor();
            return NULL;
        }
            
        
        $STMT->closeCursor();
        return json_encode($linhas);
    
    } catch(PDOException $pdoException) {           
        throw new PDOException($pdoException);    
        echo "Erro na seleção:" . $pdoException->getMessage();
        return NULL;
    }
}