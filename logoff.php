<?php
session_start();
unset($_SESSION['USUARIO_EMAIL']);
session_destroy();
header('location:index.php');
exit;