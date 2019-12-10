<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");


    $addRecurringTrips = "INSERT INTO rendszeresut(IndVaros, ErkVaros, IndDatum, ErkDatum, IndIdo, ErkIdo, HetiRendszeresseg, Hely)
                      VALUES (:startcity, :endcity, :startdate, :enddate, :starttime, :endtime, :weeklyrecurrence, :availablespace";

    $run = $databaseConnection -> prepare($addRecurringTrips);
    $run->bindValue(':startcity', $startCity);
    $run->bindValue(':endcity', $endCity);
    $run->bindValue(':startdate', $startDate);
    $run->bindValue(':enddate', $endDate);
    $run->bindValue(':starttime', $startTime);
    $run->bindValue(':endtime', $endTime);
    $run->bindValue(':weeklyrecurrence', $weeklyRecurrence);
    $run->bindValue(':availablespace', $ava);

    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);