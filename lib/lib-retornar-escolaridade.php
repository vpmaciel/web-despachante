<?php
function retornar_escolaridade() : array {
    $valor = array(        
        'Pós Doutorado',
        'Doutorado',
        'Mestrado',
        'Pós Graduação',
        'Superior',
        'Técnico',
        'Segundo Grau',
        'Primeiro Grau'
    );
    return $valor;
}
$array_escolaridade = retornar_escolaridade();