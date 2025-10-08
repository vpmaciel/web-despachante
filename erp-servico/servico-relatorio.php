<?php
require('../lib/lib-biblioteca.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 16);

if(isset($_COOKIE['servico_id'])) {
    $SQL = 'SELECT * FROM servico' . ' WHERE servico_id = ' . $_COOKIE['servico_id'];
} else {
    $SQL = 'SELECT * FROM servico LIMIT 1';
}

$stmt = $pdo->prepare($SQL);
$stmt->execute();

$pdf->SetFillColor(255, 255, 255); // Cor de fundo da célula
$pdf->SetTextColor(0); // Cor do texto

$pdf->Cell(0, 10, utf8_decode('Serviço'), 0, 1, 'C'); // Cabeçalho da tabela

while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Ln();
    $pdf->Cell(0, 10, utf8_decode('Data: ' . date('d-m-Y', strtotime($registro['servico_data']))), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Placa do veículo: ' . $registro['servico_placa_veiculo']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Valor: ' . $registro['servico_valor']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Descrição: ' . $registro['servico_descricao']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('CPF | CNPJ do cliente: ' . $registro['servico_cpf_cnpj_cliente']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Telefone do cliente: ' . $registro['servico_telefone_cliente']), 0, 1);
    $pdf->Ln();
}

// Limpeza de buffers de saída
while (ob_get_level()) {
    ob_end_clean();
}

$file = $_SERVER['DOCUMENT_ROOT'] . '/web-despachante/erp-servico/servico.pdf';

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