<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if (isset('button-add-recurring-trips')) {
    $startCity = $_POST['inputStartCity'];
    $endCity = $_POST['inputEndCity'];
    $startDate = $_POST['datepickerStartDate'];
    $endDate = $_POST['datepickerEndDate'];
    $startTime = $_POST['timepickerStartTime'];
    $endTime = $_POST['timepickerEndTime'];
    $weeklyRecurrence = $_POST['inputWeeklyRecurrence'];
    $availableSpace = $_POST['inputAvailableSpace'];

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
    $run->bindValue(':availablespace', $availableSpace);

    $run->execute();
}