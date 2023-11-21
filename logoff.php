<?php
session_start();
unset($_SESSION['usuario_nome']);
session_destroy();
header('location:index.php');
exit;