<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function addRecurringTrips($databaseConnection)
{
    $addRecurringTrips = "INSERT INTO rendszeresut(IndVaros, ErkVaros, IndDatum, ErkDatum, IndIdo, ErkIdo, HetiRendszeresseg, Hely)
                      VALUES (:startpoint, :endpoint, :startdate, :enddate, :starttime, :endtime, :weeklyrecurrence, :availablespace";

    $run = $databaseConnection -> prepare($addRecurringTrips);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);
}