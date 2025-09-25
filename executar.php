<?php
$comando = "start /B java -jar C:\\xampp\\htdocs\\web-despachante\\bit-despachante.jar";

exec($comando, $output, $return_var);

if ($return_var === 0) {
    echo "JAR executado com sucesso!";
} else {
    echo "Erro ao executar o JAR!";
}
?>