<?php

function formatar_dados($dados) : string {
    return mb_convert_case(mb_strtoupper(remover_acentos($_GET['pub_vag_cargo']), 'UTF-8'),  MB_CASE_TITLE);
}