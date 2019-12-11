<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if (isset($_POST['button-add-day'])) {
    $day = $_POST['inputDay'];
    $addDays = "INSERT INTO napok(Nap)
                VALUES (:dayz)";

    $run = $databaseConnection -> prepare($addDays);

    $run->bindValue(':dayz', $day);

    $resultSet = $run->execute();

    if ($resultSet) {
        header("Location: ../../../protected/dashboard/admin.php");
    }
}