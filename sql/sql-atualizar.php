<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

function atualizar(string $string_tabela, array $array_modelo, array $array_condicao) : bool {

    global $pdo;
    $campos = '';
    $tamanho = count ($array_modelo);
    $contador = 1;
    $string_condicao = '';
    

    if($tamanho == 0) {
        return false;
    }   

    try {

        foreach($array_modelo as $chave => $valor) {
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

            $string_condicao .= $chave . "=". $valor;               

            if($contador < $tamanho) {
                $string_condicao .= ' and ';
            }
            $contador++;
            $condicao = 1;
        }

        if($condicao == 0) {
            return false;
        }        
        
        
        //die("update $string_tabela set $campos where ($string_condicao);");
        $stmt = NULL;        
        $stmt = $pdo->prepare("update $string_tabela set $campos where ($string_condicao);--");            
        $stmt->execute(); 
        
        
        return true;
    } catch(PDOException $pdoException) {
        throw new PDOException($pdoException);    
        echo "Erro na atualização:" . $pdoException->getMessage();
        $pdo->rollback();
        return false;
    }
    return false;
}