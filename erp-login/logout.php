<?php

<<<<<<< HEAD
setcookie('usuario_nome', '', time() - 3600, '/');

header('Location: ../erp-msg/sucesso.php?msg=Sessão encerrada com sucesso!');
exit;
=======
require_once '../config/auth.php';

require_once '../config/session.php';

$_SESSION = [];
session_destroy();

header("Location: ../erp-home/home.php");
exit;
>>>>>>> a30607087405ac6b0976a766b6067e7fcaad2420
