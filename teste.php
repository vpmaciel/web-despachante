<?php

session_start();

$_SESSION['teste'] = "ok";

echo $_SESSION['teste'];