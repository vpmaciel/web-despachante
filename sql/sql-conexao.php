<?php
$DNS = "mysql:host=localhost;dbname=DB_DESPACHANTE";
$PDO = new PDO($DNS, "root", "");
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);