<?php
function selecionar( string $string_tabela, array $array_condicao) {
    
    global $pdo;
    
    if(!is_array($array_condicao) || !is_string($string_tabela)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
        //return NULL;
    }

    $string_condicao = '';
    $tamanho_array_condicao = 0;
    $tamanho_array_condicao = count ($array_condicao);
    
    $contador = 1;   
    $CLAUSULA_where = 0;    

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
                    $CLAUSULA_where = 1;
                    $string_condicao .= $chave . "=" . $valor;

                    if($contador < $tamanho_array_condicao) {
                        $string_condicao .= ' and ';
                    }
                }

                
                $contador++;
            }
        }

        
        $stmt = NULL;
        
        if ($CLAUSULA_where != 0) {
            //die("SELECT * FROM $string_tabela where ($string_condicao);");
            $stmt = $pdo->prepare("SELECT * FROM $string_tabela where ($string_condicao);--");
            
        } else {            
            $stmt = $pdo->prepare("SELECT * FROM $string_tabela;--");
        }

        if (!$stmt->execute()) {
            throw new Exception('Não executou !');            
            return NULL;
        }
        $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if($stmt->rowCount() <= 0) {            
            $stmt->closeCursor();
            return NULL;
        }
            
        
        $stmt->closeCursor();
        return json_encode($linhas);
    
    } catch(PDOException $pdoException) {           
        throw new PDOException($pdoException);    
        echo "Erro na seleção:" . $pdoException->getMessage();
        return NULL;
    }
}