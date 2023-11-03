<?php

function formatar_dados($DADOS) : string {
    return mb_convert_case(mb_strtoupper(remover_acentos($DADOS), 'UTF-8'),  MB_CASE_UPPER);
}