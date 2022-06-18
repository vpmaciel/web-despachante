<?php
function retornar_nivel_conhecimento_idioma() : array {
    $VALOR = array(        
        'Básico',
        'Intermediário',
        'Avançado',
        'Fluente',
    );
    return $VALOR;
}
$array_nivel_conhecimento_idioma = retornar_nivel_conhecimento_idioma();