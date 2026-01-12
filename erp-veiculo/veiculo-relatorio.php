<?php

require_once '../lib/lib-biblioteca.php';

require_once 'cliente-dao.php';

$clienteDAO = new ClienteDAO();

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 16);

if(isset($_COOKIE['veiculo_id'])) {
    $SQL = 'SELECT * FROM veiculo' . ' WHERE veiculo_id = ' . $_COOKIE['veiculo_id'];
} else {
    $SQL = 'SELECT * FROM veiculo LIMIT 1';
}

$stmt = $pdo->prepare($SQL);
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
$file = $_SERVER['DOCUMENT_ROOT'] . '/web-despachante/erp-servico/servico.pdf';

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
