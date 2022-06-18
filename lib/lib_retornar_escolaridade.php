<?php
function retornar_escolaridade() : array {
    $VALOR = array(        
        'Pós Doutorado',
        'Doutorado',
        'Mestrado',
        'Pós Graduação',
        'Superior',
        'Técnico',
        'Segundo Grau',
        'Primeiro Grau'
    );
    return $VALOR;
}
$array_escolaridade = retornar_escolaridade();