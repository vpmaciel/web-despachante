<?php
require('../lib/lib-biblioteca.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 16);

$SQL = 'SELECT * FROM pedido_de_placa';

$stmt = $pdo->prepare($SQL);
$stmt->execute();

$pdf->SetFillColor(255, 255, 255); // Cor de fundo da célula
$pdf->SetTextColor(0); // Cor do texto

$pdf->Cell(0, 10, 'Pedido de Placa', 0, 1, 'C'); // Cabeçalho da tabela

while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Ln();
    $pdf->Cell(0, 10, utf8_decode('Data: ' . date('d-m-Y', strtotime($registro['pedido_de_placa_data']))), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Placa do veículo: ' . $registro['pedido_de_placa_placa_veiculo']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Quantidade: ' . $registro['pedido_de_placa_quantidade']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('RENAVAM: ' . $registro['pedido_de_placa_renavam']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('CPF | CNPJ do proprietário: ' . $registro['pedido_de_placa_cpf_cnpj_proprietario']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Cor: ' . $registro['pedido_de_placa_cor_placa']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Tipo de placa: ' . $registro['pedido_de_placa_tipo_placa']), 0, 1);
    $pdf->Ln();
}

// Limpeza de buffers de saída
while (ob_get_level()) {
    ob_end_clean();
}

$file = $_SERVER['DOCUMENT_ROOT'] . '/web-despachante/erp-pedido-de-placa/pedido-de-placa.pdf';

if (file_exists($file)) {
    // Headers para PDF
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($file) . '"'); // Use "inline" para abrir no navegador
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    
    // Limpar qualquer output anterior
    flush();
    
    readfile($file);
    exit;
} else {
    http_response_code(404);
    echo "O arquivo não foi encontrado. Caminho: " . $file;
}
