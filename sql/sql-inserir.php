<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

function inserir( string $string_tabela, array $array_modelo) : bool {
    
    if(!is_array($array_modelo) || !is_string($string_tabela)) {
        throw new Exception('Tipos de parametros imcompatíveis !');
    }

    global $pdo;
    $campos = '';
    $valores = '';
    $tamanho = count ($array_modelo);
    $contador = 1;
    

    try {

        foreach($array_modelo as $chave => $valor) {
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
        //exit("insert into $string_tabela ($campos) values ($valores);");

        $stmt = $pdo->prepare("insert into $string_tabela ($campos) values ($valores);--");        
        $stmt->execute();        

        
        return true;
    
    } catch(PDOException $pdoException) {
          
        $mensagem =  $pdoException->getMessage();

        if (strpos($mensagem, "Integrity") !== false) {
            header('location: erro.php?msg=Erro na inserção ! Verifique se já não possui um registro com campos únicos já cadastrados');    
            exit;
        } else {
            echo "A string não contém a palavra 'Integrity'.";
        }       

        $pdo->rollback();
        return false;
    }

    return false;
}