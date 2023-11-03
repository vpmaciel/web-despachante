<?php

function converterParaUTF_8($VALOR){

    return mb_convert_encoding($VALOR, 'UTF-8', mb_detect_encoding($VALOR));
}

