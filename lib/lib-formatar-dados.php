<?php

function formatar_dados($dados) : string {
    return mb_convert_case(mb_strtoupper(remover_acentos($dados), 'UTF-8'),  MB_CASE_UPPER);
}