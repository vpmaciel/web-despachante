<?php
session_start();
unset($_SESSION['usuario_email']);
session_destroy();
header('location:index.php');
exit;