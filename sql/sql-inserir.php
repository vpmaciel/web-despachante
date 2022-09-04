<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

require_once 'sql/conexao.php';


function inserir( string $char_tabela, array $array_model) : bool {
    
    if(!is_array($array_model) || !is_string($char_tabela)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
    }

    global $pdo;
    $campos = '';
    $valores = '';
    $tamanho = count ($array_model);
    $contador = 1;
    $retorno = FALSE;

    try {

        foreach($array_model as $chave => $valor) {
            $valor = escapeshellcmd($valor);
          
            $valor = remover_caracteres($valor);
            
            if (!is_numeric($valor)) {
                if (strstr($valor, '@') !== false || strstr($valor, '.') !== false) {
                    $valor = "'".  mb_strtolower( $valor, 'UTF-8') . "'";
                } else {
                    $valor = "'" . mb_convert_case(mb_strtolower( $valor, 'UTF-8'),  MB_CASE_TITLE) . "'";
                    
                }                
            }
            $valores .= $valor;  
            $campos .= $chave;

            if($contador < $tamanho) {
                $campos .= ',';
                $valores .= ',';
            }
            $contador++;
        }
        //exit("INSERT INTO $char_tabela ($campos) VALUES ($valores);");

        $stmt = $pdo->prepare("INSERT INTO $char_tabela ($campos) VALUES ($valores);--");        
        $stmt->execute();        

        
        return TRUE;
    
    } catch(PDOException $pdoException) {
        throw new PDOException($pdoException);    
        echo "Erro na inserção:" . $pdoException->getMessage();
        $pdo->rollback();
        return FALSE;
    }

    return FALSE;
}