<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$queryStation = "SELECT ID, IRSZ, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, KoordSz, KoordH 
                 FROM szemely";

$run = $databaseConnection -> prepare($queryStation);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);