<?php
require_once __DIR__ . '/session.php';

if (!isset($_SESSION['usuario_nome'])) {
    header("Location: ../erp-home/home.php");
    exit;
}
