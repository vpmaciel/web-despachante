<?php

function converterParaUTF_8($valor){

    return mb_convert_encoding($valor, 'UTF-8', mb_detect_encoding($valor));
}

