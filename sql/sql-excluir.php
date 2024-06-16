<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

function excluir(string $string_tabela, array $array_condicao) : bool {
    global $pdo;
    if(!is_array($array_condicao) && !is_string($string_tabela)) {
        throw new Exception('Tipos de parametros imcompatíveis !');        
        return false;
    }
    $campos = '';
    $string_condicao = '';
    $tamanho = count ($array_condicao);
    $contador = 1;
    if($tamanho == 0 || !isset($array_condicao)) {
        return false;
    }   
    
    try {
        $contador = 1;
        $tamanho = count ($array_condicao);
        foreach($array_condicao as $chave => $valor) { 
            $valor = escapeshellcmd($valor);
            
            $valor = remover_caracteres($valor);
            if (!is_numeric($valor)) {
                if (strstr($valor, '@') !== false || strstr($valor, '.') !== false) {
                    $valor = "'".  mb_strtolower( $valor, 'UTF-8') . "'";
                } else {
                    $valor = "'" . mb_convert_case(mb_strtolower( $valor, 'UTF-8'),  MB_CASE_TITLE) . "'";
                }                
            }
            
            $string_condicao .= $chave . "=". $valor;               

            if($contador < $tamanho) {
                $string_condicao .= ' and ';
            }
            $contador++;
        }


        //exit("DELETE FROM $string_tabela where ($string_condicao);");
        $stmt = $pdo->prepare("DELETE FROM $string_tabela where ($string_condicao);--");
        return ($stmt->execute()) ? true : false; 

    } catch(PDOException $pdoException) {
        throw new PDOException($pdoException);    
        echo "Erro na exclusão:" . $pdoException->getMessage();
        $pdo->rollback();
        return false;
    }
}
