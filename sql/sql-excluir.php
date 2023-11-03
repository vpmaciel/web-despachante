<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function excluir(string $CHAR_TABELA, array $ARRAY_CONDICAO) : bool {
    global $PDO;
    if(!is_array($ARRAY_CONDICAO) && !is_string($CHAR_TABELA)) {
        throw new Exception('Tipos de parametros imcompatíveis !');        
        return FALSE;
    }
    $CAMPOS = '';
    $CHAR_CONDICAO = '';
    $TAMANHO = count ($ARRAY_CONDICAO);
    $CONTADOR = 1;
    if($TAMANHO == 0 || !isset($ARRAY_CONDICAO)) {
        return FALSE;
    }   
    
    try {
        $CONTADOR = 1;
        $TAMANHO = count ($ARRAY_CONDICAO);
        foreach($ARRAY_CONDICAO as $chave => $VALOR) { 
            $VALOR = escapeshellcmd($VALOR);
            
            $VALOR = remover_caracteres($VALOR);
            if (!is_numeric($VALOR)) {
                if (strstr($VALOR, '@') !== false || strstr($VALOR, '.') !== false) {
                    $VALOR = "'".  mb_strtolower( $VALOR, 'UTF-8') . "'";
                } else {
                    $VALOR = "'" . mb_convert_case(mb_strtolower( $VALOR, 'UTF-8'),  MB_CASE_TITLE) . "'";
                }                
            }
            
            $CHAR_CONDICAO .= $chave . "=". $VALOR;               

            if($CONTADOR < $TAMANHO) {
                $CHAR_CONDICAO .= ' AND ';
            }
            $CONTADOR++;
        }


        //exit("DELETE FROM $CHAR_TABELA WHERE ($CHAR_CONDICAO);");
        $STMT = $PDO->prepare("DELETE FROM $CHAR_TABELA WHERE ($CHAR_CONDICAO);--");
        $RETORNO = ($STMT->execute()) ? TRUE : FALSE; 
      
        return TRUE;
    
    } catch(PDOException $PDOException) {
        throw new PDOException($PDOException);    
        echo "Erro na exclusão:" . $PDOException->getMessage();
        $PDO->rollback();
        return FALSE;
    }
}
