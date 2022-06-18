<?php
function retornar_nivel_conhecimento() : array {
    $VALOR = array(        
        'Básico',
        'Intermediário',
        'Avançado'
    );
    return $VALOR;
}
$array_nivel_conhecimento = retornar_nivel_conhecimento();