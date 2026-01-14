<?php
class Relatorio
{
    public function __construct($pdf, $file)
    {
        // 🔹 Gera o PDF em disco
        $pdf->Output('F', $file);

        // 🔹 Limpeza de buffers
        while (ob_get_level()) {
            ob_end_clean();
        }

        // 🔹 Envia o PDF para o navegador
        if (file_exists($file)) {

            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($file) . '"');
            header('Content-Length: ' . filesize($file));

            readfile($file);
            exit;
        } else {
            http_response_code(404);
            echo "O arquivo não foi encontrado. Caminho: " . $file;
        }
    }
}
