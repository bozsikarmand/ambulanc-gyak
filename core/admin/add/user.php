<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$queryUser = "SELECT ID, CONCAT(szemely.Vezeteknev, 
                       SPACE(1), 
                       szemely.Keresztnev, 
                       SPACE(1), 
                       szemely.Utonev) as fullname 
              FROM szemely";

$run = $databaseConnection -> prepare($queryUser);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);