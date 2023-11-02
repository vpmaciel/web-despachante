<?php

function converterParaUTF_8($string){

    return mb_convert_encoding($string, 'UTF-8', mb_detect_encoding($string));
}

