<?php
require('../lib/lib-biblioteca.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 16);

$pedidoDePlacaDAO = new PedidoDePlacaDAO();

$stmt = $pedidoDePlacaDAO->relatorio();
$stmt->execute();

$pdf->SetFillColor(255, 255, 255); // Cor de fundo da célula
$pdf->SetTextColor(0); // Cor do texto

$pdf->Cell(0, 10, 'Pedido de Placa', 0, 1, 'C'); // Cabeçalho da tabela

while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Ln();
    $pdf->Cell(0, 10, mb_convert_encoding('Data: ' . date('d-m-Y', strtotime($registro['pedido_de_placa_data'])), 'ISO-8859-1', 'UTF-8'), 0, 1);
    $pdf->Cell(0, 10, mb_convert_encoding('Placa do veículo: ' . $registro['pedido_de_placa_placa_veiculo'], 'ISO-8859-1', 'UTF-8'), 0, 1);
    $pdf->Cell(0, 10, mb_convert_encoding('Quantidade: ' . $registro['pedido_de_placa_quantidade'], 'ISO-8859-1', 'UTF-8'), 0, 1);
    $pdf->Cell(0, 10, mb_convert_encoding('RENAVAM: ' . $registro['pedido_de_placa_renavam'], 'ISO-8859-1', 'UTF-8'), 0, 1);
    $pdf->Cell(0, 10, mb_convert_encoding('CPF | CNPJ do proprietário: ' . $registro['pedido_de_placa_cpf_cnpj_proprietario'], 'ISO-8859-1', 'UTF-8'), 0, 1);
    $pdf->Cell(0, 10, mb_convert_encoding('Cor: ' . $registro['pedido_de_placa_cor_placa'], 'ISO-8859-1', 'UTF-8'), 0, 1);
    $pdf->Cell(0, 10, mb_convert_encoding('Tipo de placa: ' . $registro['pedido_de_placa_tipo_placa'], 'ISO-8859-1', 'UTF-8'), 0, 1);
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
