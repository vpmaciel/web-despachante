<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

function retornar_numero_registros(string $string_tabela, array $array_condicao) : int {
    global $pdo;
    
    if(!is_string($string_tabela) || !is_array($array_condicao)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
        return 0;
    }
    $string_condicao = '';
    $tamanho_array_condicao = count ($array_condicao);        

    try {
        $contador = 1;
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
               
            $string_condicao .= $chave . "=" . $valor;               

            if($contador < $tamanho_array_condicao) {
                $string_condicao .= ' and ';
            }
            $contador++;
        }
        //exit("SELECT COUNT(*) FROM $string_tabela where ($string_condicao);");
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM $string_tabela where ($string_condicao);--");
        if (!$stmt->execute()) {
            return 0;
        }
        $numero_registros = $stmt->fetchColumn();         
        return $numero_registros;    
    } catch(PDOException $pdoException) {           
        throw new PDOException($pdoException);    
        echo "Erro na inserção:" . $pdoException->getMessage();
        return 0;
    }
}

