<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function atualizar( string $CHAR_TABELA, array $ARRAY_MODEL, array $ARRAY_CONDICAO) : bool {

    global $PDO;
    $CAMPOS = '';
    $TAMANHO = count ($ARRAY_MODEL);
    $CONTADOR = 1;
    $CHAR_CONDICAO = '';
    $RETORNO = FALSE;

    if($TAMANHO == 0)
    {
        return FALSE;
    }   

    try {

        foreach($ARRAY_MODEL as $CHAVE => $VALOR) {
            $VALOR = escapeshellcmd($VALOR);
            
            $VALOR = remover_caracteres($VALOR);

            $VALOR = "'" . mb_convert_case(mb_strtoupper( $VALOR, 'UTF-8'),  MB_CASE_UPPER) . "'";
            
            $CAMPOS .= $CHAVE . "=". $VALOR;               

            if($CONTADOR < $TAMANHO) {
                $CAMPOS .= ',';
            }                
            $CONTADOR++;
        }
        
        $CONDICAO = 0;        
        $CONTADOR = 1;
        $TAMANHO = count ($ARRAY_CONDICAO);

        foreach($ARRAY_CONDICAO as $CHAVE => $VALOR) {
            $VALOR = remover_caracteres($VALOR);

            $VALOR = "'" . mb_convert_case(mb_strtoupper( $VALOR, 'UTF-8'),  MB_CASE_UPPER) . "'";

            $CHAR_CONDICAO .= $CHAVE . "=". $VALOR;               

            if($CONTADOR < $TAMANHO) {
                $CHAR_CONDICAO .= ' AND ';
            }
            $CONTADOR++;
            $CONDICAO = 1;
        }

        if($CONDICAO == 0) {
            return FALSE;
        }        
        
        
        //die("UPDATE $CHAR_TABELA SET $CAMPOS WHERE ($CHAR_CONDICAO);");
        $STMT = NULL;        
        $STMT = $PDO->prepare("UPDATE $CHAR_TABELA SET $CAMPOS WHERE ($CHAR_CONDICAO);--");            
        $STMT->execute(); 
        
        
        return TRUE;
    } catch(PDOException $PDOException) {
        throw new PDOException($PDOException);    
        echo "Erro na atualização:" . $PDOException->getMessage();
        $PDO->rollback();
        return FALSE;
    }
    return FALSE;
}