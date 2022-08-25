<?php
function retornar_contrato() : array
{
    $VALOR = array(        
        'Efetivo (CLT)',
        'Estágio',
        'Temporário',
        'Autônomo',
        'Prestador De Serviços (PJ)',
        'Trainee',
        'Cooperado',
        'Outros',
    );
    return $VALOR;
}
$array_contrato = retornar_contrato();