<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

require_once 'sql/conexao.php';

function retornar_numero_registros(string $char_tabela, array $array_condicao) : int {
    global $pdo;
    
    if(!is_string($char_tabela) || !is_array($array_condicao)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
        return 0;
    }
    $char_condicao = '';
    $tamanho_array_condicao = count ($array_condicao);        

    try {
        $contador = 1;
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
               
            $char_condicao .= $chave . "=" . $valor;               

            if($contador < $tamanho_array_condicao) {
                $char_condicao .= ' AND ';
            }
            $contador++;
        }
        //exit("SELECT COUNT(*) FROM $char_tabela WHERE ($char_condicao);");
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM $char_tabela WHERE ($char_condicao);--");
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

