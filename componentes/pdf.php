<?php

class PDF extends FPDF
{
    function Footer()
    {
        // Posição 15mm acima do final
        $this->SetY(-15);

        // Fonte do rodapé
        $this->SetFont('Arial', 'I', 8);

        // Data e hora
        $dataHora = date('d/m/Y H:i:s');

        // Texto centralizado
        $this->Cell(0, 10, mb_convert_encoding(
            'Gerado em: ' . $dataHora,
            'ISO-8859-1',
            'UTF-8'
        ), 0, 0, 'C');
    }
}
