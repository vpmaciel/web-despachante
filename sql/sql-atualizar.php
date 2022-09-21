<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

require_once 'conexao.php';

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
            
            $valor = remover_caracteres($valor);

            $valor = "'" . mb_convert_case(mb_strtoupper( $valor, 'UTF-8'),  MB_CASE_UPPER) . "'";
            
            $campos .= $chave . "=". $valor;               

            if($contador < $tamanho) {
                $campos .= ',';
            }                
            $contador++;
        }
        
        $condicao = 0;        
        $contador = 1;
        $tamanho = count ($array_condicao);

        foreach($array_condicao as $chave => $valor) {
            $valor = remover_caracteres($valor);

            $valor = "'" . mb_convert_case(mb_strtoupper( $valor, 'UTF-8'),  MB_CASE_UPPER) . "'";

            $char_condicao .= $chave . "=". $valor;               

            if($contador < $tamanho) {
                $char_condicao .= ' AND ';
            }
            $contador++;
            $condicao = 1;
        }

        if($condicao == 0) {
            return FALSE;
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