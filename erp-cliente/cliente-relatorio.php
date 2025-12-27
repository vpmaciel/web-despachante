<?php

require_once '../lib/lib-biblioteca.php';

require_once 'cliente-dao.php';

$clienteDAO = new ClienteDAO();

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 16);

$stmt = $clienteDAO->relatorio();

$stmt->execute();

$pdf->SetFillColor(255, 255, 255); // Cor de fundo da célula
$pdf->SetTextColor(0); // Cor do texto

$pdf->Cell(0, 10, 'Cliente', 0, 1, 'C'); // Cabeçalho da tabela

while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Ln();

    $pdf->Cell(0, 10, mb_convert_encoding('Nome: ' . $registro['cliente_nome_completo'], 'ISO-8859-1', 'UTF-8'), 0, 1);
    $pdf->Cell(0, 10, mb_convert_encoding('CPF | CNPJ: ' . $registro['cliente_cpf_cnpj'], 'ISO-8859-1', 'UTF-8'), 0, 1);
    $pdf->Cell(0, 10, mb_convert_encoding('Telefone: ' . $registro['cliente_telefone'], 'ISO-8859-1', 'UTF-8'), 0, 1);
    $pdf->Cell(0, 10, mb_convert_encoding('E-mail: ' . $registro['cliente_email'], 'ISO-8859-1', 'UTF-8'), 0, 1);
    $pdf->Ln();
}

// Limpeza de buffers de saída
while (ob_get_level()) {
    ob_end_clean();
}

$file = $_SERVER['DOCUMENT_ROOT'] . '/web-despachante/erp-cliente/cliente.pdf';

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
