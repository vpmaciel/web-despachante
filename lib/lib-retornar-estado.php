<?php
function retornar_estado() : array {
    $valor = array(        
        'ACRE',
        'ALAGOAS',
        'AMAPÁ',
        'AMAZONAS',
        'BAHIA',
        'CEARÁ',
        'DISTRITO FEDERAL',
        'ESPÍRITO SANTO',
        'GOIÁS',
        'MARANHÃO',
        'MATO GROSSO',
        'MATO GROSSO DO SUL',
        'MINAS GERAIS',
        'PARÁ',
        'PARAÍBA',
        'PARANÁ',
        'PERNAMBUCO',
        'PIAUÍ',
        'RIO DE JANEIRO',
        'RIO GRANDE DO NORTE',
        'RIO GRANDE DO SUL',
        'RONDÔNIA',
        'RORAIMA',
        'SANTA CATARINA',
        'SÃO PAULO',
        'SERGIPE',
        'TOCANTINS'
    );
    return $valor;
}
$array_estado = retornar_estado();