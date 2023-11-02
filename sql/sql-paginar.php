<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function paginar( string $char_tabela, array $array_condicao, $pagina_primeiro_resultado = 1, $resultados_por_pagina = 1 ) {
    
    global $pdo;
    
    if(!is_array($array_condicao) || !is_string($char_tabela)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
        //return NULL;
    }

    $char_condicao = '';
    $tamanho_array_condicao = 0;
    $tamanho_array_condicao = count ($array_condicao);
    
    $contador = 1;   
    $clausula_where = 0;    

    try {
        if($tamanho_array_condicao > 0) {
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
                //exit($valor);
                if($valor != "''"){
                    $clausula_where = 1;
                    $char_condicao .= $chave . "=" . $valor;

                    if($contador < $tamanho_array_condicao - 1) {
                        $char_condicao .= ' AND ';
                    }
                }

                
                $contador++;
            }
        }

        
        $stmt = NULL;
        
        if ($clausula_where != 0) {
            //die("SELECT * FROM $char_tabela WHERE ($char_condicao);");            
            $stmt = "SELECT * FROM $char_tabela WHERE $char_condicao LIMIT " . $pagina_primeiro_resultado . ',' . $resultados_por_pagina . ';--';     
            
        } else {                        
            $stmt = "SELECT * FROM $char_tabela LIMIT " . $pagina_primeiro_resultado . ',' . $resultados_por_pagina . ';--';
        }      
        //die($stmt);
        return $stmt;
    
    } catch(PDOException $pdoException) {           
        throw new PDOException($pdoException);    
        echo "Erro na seleção:" . $pdoException->getMessage();
        return NULL;
    }
}
