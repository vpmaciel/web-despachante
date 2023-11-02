<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function inserir( string $char_tabela, array $array_model) : bool {
    
    if(!is_array($array_model) || !is_string($char_tabela)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
    }

    global $PDO;
    $campos = '';
    $valores = '';
    $tamanho = count ($array_model);
    $contador = 1;
    $retorno = FALSE;

    try {

        foreach($array_model as $chave => $valor) {
            $valor = escapeshellcmd($valor);
          
            $valor = remover_caracteres($valor);
            
            $valor = "'" . mb_convert_case(mb_strtoupper( $valor, 'UTF-8'),  MB_CASE_UPPER) . "'";

            $valores .= $valor;  
            $campos .= $chave;

            if($contador < $tamanho) {
                $campos .= ',';
                $valores .= ',';
            }
            $contador++;
        }
        //exit("INSERT INTO $char_tabela ($campos) VALUES ($valores);");

        $stmt = $PDO->prepare("INSERT INTO $char_tabela ($campos) VALUES ($valores);--");        
        $stmt->execute();        

        
        return TRUE;
    
    } catch(PDOException $PDOException) {
        throw new PDOException($PDOException);    
        echo "Erro na inserção:" . $PDOException->getMessage();
        $PDO->rollback();
        return FALSE;
    }

    return FALSE;
}