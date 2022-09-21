<?php

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$json = file_get_contents($actual_link);
$obj = json_decode($json);
#echo $obj->id;
echo $actual_link;
