<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if (isset($_POST['button-add-recurring-trips'])) {
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

    $resultSet = $run->execute();

    if ($resultSet) {
        header("Location: ../../../protected/dashboard/user.php");
    }
}