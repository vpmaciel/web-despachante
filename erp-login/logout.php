<?php

require_once '../config/auth.php';

require_once '../config/session.php';

$_SESSION = [];
session_destroy();

header("Location: ../erp-home/home.php");
exit;