<?php
$dns = "mysql:host=localhost;dbname=DB_DESPACHANTE";
$pdo = new PDO($dns, "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);