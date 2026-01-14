<?php

require_once '../lib/lib-biblioteca.php';

$veiculoDAO = new VeiculoDAO();

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 16);

$registro['veiculo_id'] = $_COOKIE['veiculo_id'];

$stmt = $veiculoDAO->relatorio($registro);

$stmt->execute();

$pdf->SetFillColor(255, 255, 255); // Cor de fundo da célula
$pdf->SetTextColor(0); // Cor do texto

$pdf->Cell(0, 10, 'Veículo', 0, 1, 'C'); // Cabeçalho da tabela

if ($stmt->rowCount() === 0) {

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, mb_convert_encoding('Nenhum registro encontrado.', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');
} else {
    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pdf->Ln();
        $pdf->Cell(0, 10, mb_convert_encoding('Placa do veículo: ' . $registro['veiculo_placa'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('CPF | CNPJ do proprietário: ' . $registro['veiculo_cpf_cnpj_proprietario'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('Nome do proprietário: ' . $registro['veiculo_nome_proprietario'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('Marca: ' . $registro['veiculo_marca'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('Modelo: ' . $registro['veiculo_modelo'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Ln();
    }
}

// 🔹 Caminho do arquivo
$file = $_SERVER['DOCUMENT_ROOT'] . '/web-despachante/erp-veiculo/veiculo.pdf';

$relatorio = new Relatorio($pdf, $file);
