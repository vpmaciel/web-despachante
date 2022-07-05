<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

require_once 'conexao.php';

function excluir(string $char_tabela, array $array_condicao) : bool {
    global $pdo;
    if(!is_array($array_condicao) && !is_string($char_tabela)) {
        throw new Exception('Tipos de parametros imcompatíveis !');        
        return FALSE;
    }
    $campos = '';
    $char_condicao = '';
    $tamanho = count ($array_condicao);
    $contador = 1;
    if($tamanho == 0 || !isset($array_condicao)) {
        return FALSE;
    }   
    
    try {
        $contador = 1;
        $tamanho = count ($array_condicao);
        foreach($array_condicao as $chave => $valor) { 
            $valor = escapeshellcmd($valor);
            if(verificarSQL($valor)) {
                throw new Exception('Tentativa de SQL injection !');               
            }
            $valor = remover_caracteres($valor);
            if (!is_numeric($valor)) {
                if (strstr($valor, '@') !== false || strstr($valor, '.') !== false) {
                    $valor = "'".  mb_strtolower( $valor, 'UTF-8') . "'";
                } else {
                    $valor = "'" . mb_convert_case(mb_strtolower( $valor, 'UTF-8'),  MB_CASE_TITLE) . "'";
                }                
            }
            
            $char_condicao .= $chave . "=". $valor;               

            if($contador < $tamanho) {
                $char_condicao .= ' AND ';
            }
            $contador++;
        }

        $pdo->beginTransaction();
        //exit("DELETE FROM $char_tabela WHERE ($char_condicao);");
        $stmt = $pdo->prepare("DELETE FROM $char_tabela WHERE ($char_condicao);--");
        $retorno = ($stmt->execute()) ? TRUE : FALSE; 
        $pdo->commit();        
        return TRUE;
    
    } catch(PDOException $pdoException) {
        throw new PDOException($pdoException);    
        echo "Erro na exclusão:" . $pdoException->getMessage();
        $pdo->rollback();
        return FALSE;
    }
}
