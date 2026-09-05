<?php

setcookie('usuario_nome', '', time() - 3600, '/');

header('Location: ../erp-msg/sucesso.php?msg=Sessão encerrada com sucesso!');
exit;
