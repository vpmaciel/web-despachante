<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

require_once '../sql/conexao.php';

function atualizar( string $char_tabela, array $array_model, array $array_condicao) : bool {
    if(!is_array($array_model) || !is_array($array_condicao) || !is_string($char_tabela)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
        return FALSE;
    }
    global $pdo;
    $campos = '';
    $tamanho = count ($array_model);
    $contador = 1;
    $char_condicao = '';
    $retorno = FALSE;

    if($tamanho == 0)
    {
        return FALSE;
    }   

    try {

        foreach($array_model as $chave => $valor) {
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
            
            $campos .= $chave . "=". $valor;               

            if($contador < $tamanho) {
                $campos .= ',';
            }                
            $contador++;
        }

        $contador = 1;
        $tamanho = count ($array_condicao);
        foreach($array_condicao as $chave => $valor) {
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
        
        
        //die("UPDATE $char_tabela SET $campos WHERE ($char_condicao);");
        $stmt = NULL;        
        $stmt = $pdo->prepare("UPDATE $char_tabela SET $campos WHERE ($char_condicao);--");            
        $stmt->execute(); 
        
        
        return TRUE;
    } catch(PDOException $pdoException) {
        throw new PDOException($pdoException);    
        echo "Erro na atualização:" . $pdoException->getMessage();
        $pdo->rollback();
        return FALSE;
    }
    return FALSE;
}