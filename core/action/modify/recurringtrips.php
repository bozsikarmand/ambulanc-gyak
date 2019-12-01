<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$queryRecurringTrips = "SELECT ID, IndVaros, ErkVaros, IndDatum, ErkDatum, IndIdo, ErkIdo, HetiRendszeresseg, Hely
                        FROM rendszeresut";

$run = $databaseConnection -> prepare($queryRecurringTrips);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);