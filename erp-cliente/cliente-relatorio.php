<?php

require_once '../lib/lib-biblioteca.php';

require_once 'cliente-dao.php';

$clienteDAO = new ClienteDAO();

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 16);

$registro['cliente_id'] = $_COOKIE['cliente_id'];

$stmt = $clienteDAO->relatorio($registro);

$stmt->execute();

$pdf->SetFillColor(255, 255, 255); // Cor de fundo da célula
$pdf->SetTextColor(0); // Cor do texto

$pdf->Cell(0, 10, 'Cliente', 0, 1, 'C'); // Cabeçalho da tabela

if ($stmt->rowCount() === 0) {

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, mb_convert_encoding('Nenhum registro encontrado.', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');
} else {
    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pdf->Ln();

        $pdf->Cell(0, 10, mb_convert_encoding('Nome: ' . $registro['cliente_nome_completo'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('CPF | CNPJ: ' . $registro['cliente_cpf_cnpj'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('Telefone: ' . $registro['cliente_telefone'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('E-mail: ' . $registro['cliente_email'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Ln();
    }
}

// 🔹 Caminho do arquivo
$file = $_SERVER['DOCUMENT_ROOT'] . '/web-despachante/erp-cliente/cliente.pdf';

$relatorio = new Relatorio($pdf, $file);