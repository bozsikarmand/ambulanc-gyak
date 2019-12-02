<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$addStation = "INSERT INTO allomas(IRSZ, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, KoordSz, KoordH) 
               VALUES(:zip, :city, :publicplacename, :publicplacetrait, :housenumber, :building, :coordW, :coordH)";

$run = $databaseConnection -> prepare($queryStation);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);