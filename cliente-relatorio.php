<?php

require('lib/lib-biblioteca.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 16);

if(isset($_COOKIE['cliente_id'])) {
    $SQL = 'SELECT * FROM cliente' . ' WHERE cliente_id = ' . $_COOKIE['cliente_id'];
} else {
    $SQL = 'SELECT * FROM cliente';
}

$stmt = $pdo->prepare($SQL);
$stmt->execute();

$pdf->SetFillColor(255, 255, 255); // Cor de fundo da célula
$pdf->SetTextColor(0); // Cor do texto

$pdf->Cell(0, 10, 'Cliente', 0, 1, 'C'); // Cabeçalho da tabela

while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Ln();
    $pdf->Cell(0, 10, utf8_decode('Identificador: ' . $registro['cliente_id']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Nome: ' . $registro['cliente_nome_completo']), 0, 1);    
    $pdf->Cell(0, 10, utf8_decode('CPF | CNPJ: ' . $registro['cliente_cpf_cnpj']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Telefone: ' . $registro['cliente_telefone']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('E-mail: ' . $registro['cliente_email']), 0, 1);
    $pdf->Ln();
}

    $caminhoArquivo = 'cliente.pdf';
    $pdf->Output('F', $caminhoArquivo);

$file = 'cliente.pdf';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
} else {
    echo "O arquivo não foi encontrado.";
}
