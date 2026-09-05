<?php

require_once '../lib/lib-biblioteca.php';

$servicoDAO = new ServicoDAO();

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$registro['servico_id'] =  Cookie::decryptCookie($_COOKIE['servico_id']);
$stmt = $servicoDAO->relatorio($registro);

$stmt->execute();

$pdf->SetFillColor(255, 255, 255); // Cor de fundo da célula
$pdf->SetTextColor(0); // Cor do texto

$pdf->Cell(0, 10, mb_convert_encoding('Serviço', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C'); // Cabeçalho da tabela

if ($stmt->rowCount() === 0) {    
    $pdf->Cell(0, 10, mb_convert_encoding('Nenhum registro encontrado.', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');
} else {
    while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pdf->Ln();

        $pdf->Cell(0, 10, mb_convert_encoding('Data: ' . date('d-m-Y', strtotime($registro['servico_data'])), 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('Placa do veículo: ' . $registro['servico_placa_veiculo'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('Valor: ' . $registro['servico_valor'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('Descrição: ' . $registro['servico_descricao'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('CPF | CNPJ do cliente: ' . $registro['servico_cpf_cnpj_cliente'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Cell(0, 10, mb_convert_encoding('Telefone do cliente: ' . $registro['servico_telefone_cliente'], 'ISO-8859-1', 'UTF-8'), 0, 1);
        $pdf->Ln();
    }
}

// 🔹 Caminho do arquivo
$file = $_SERVER['DOCUMENT_ROOT'] . '/web-despachante/erp-servico/servico.pdf';

$relatorio = new Relatorio($pdf, $file);
