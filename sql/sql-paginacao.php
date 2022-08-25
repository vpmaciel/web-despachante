<?php

function paginar( $tabela) {

    global $pdo;
    
    $resultados_por_pagina = 2;  

    $stmt = $pdo->prepare("SELECT * FROM publica_vaga;--");
        
    if (!$stmt->execute()) {
            throw new Exception('Não executou !');            
            return NULL;
        }
        $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeros_de_resultado = count($publica_vaga_json);
        
    
    $numeros_de_pagina = ceil ($numeros_de_resultado / $resultados_por_pagina);  
    
    //determine which pagina number visitor is currently on  
    if (!isset ($_GET['pagina']) ) {  
        $pagina = 1;  
    } else {  
        $pagina = $_GET['pagina'];  
    }  
    
    //determine the sql LIMIT starting number for the results on the displaying pagina  
    $pagina_primeiro_resultado = ($pagina-1) * $resultados_por_pagina;  
    $stmt = null;
    //retrieve the selected results from database   
    $stmt = $pdo->prepare("SELECT * FROM publica_vaga LIMIT " . $pagina_primeiro_resultado . ',' . $resultados_por_pagina . ';--');     
    
    $stmt->execute();
    $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $linhas;
}