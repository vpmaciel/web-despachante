<?php
function retornar_nacionalidade() : array{
    $VALOR = array(        
        'Barsileiro Nato',
        'Brasileiro Naturalizado',
        'Estrangeiro'
    );
    return $VALOR;
}
$array_nacionalidade = retornar_nacionalidade();