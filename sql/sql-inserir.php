<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

function inserir( string $CHAR_TABELA, array $ARRAY_MODEL) : bool {
    
    if(!is_array($ARRAY_MODEL) || !is_string($CHAR_TABELA)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
    }

    global $PDO;
    $CAMPOS = '';
    $VALORES = '';
    $TAMANHO = count ($ARRAY_MODEL);
    $CONTADOR = 1;
    $RETORNO = FALSE;

    try {

        foreach($ARRAY_MODEL as $chave => $VALOR) {
            $VALOR = escapeshellcmd($VALOR);
          
            $VALOR = remover_caracteres($VALOR);
            
            $VALOR = "'" . mb_convert_case(mb_strtoupper( $VALOR, 'UTF-8'),  MB_CASE_UPPER) . "'";

            $VALORES .= $VALOR;  
            $CAMPOS .= $chave;

            if($CONTADOR < $TAMANHO) {
                $CAMPOS .= ',';
                $VALORES .= ',';
            }
            $CONTADOR++;
        }
        //exit("INSERT INTO $CHAR_TABELA ($CAMPOS) VALUES ($VALORES);");

        $stmt = $PDO->prepare("INSERT INTO $CHAR_TABELA ($CAMPOS) VALUES ($VALORES);--");        
        $stmt->execute();        

        
        return TRUE;
    
    } catch(PDOException $PDOException) {
          
        $MENSAGEM =  $PDOException->getMessage();

        if (strpos($MENSAGEM, "Integrity") !== false) {
            header('location: erro.php?msg=Erro na inserção ! Verifique se já não possui um registro com CAMPOS únicos já cadastrados');    
            exit;
        } else {
            echo "A string não contém a palavra 'Integrity'.";
        }       

        $PDO->rollback();
        return FALSE;
    }

    return FALSE;
}