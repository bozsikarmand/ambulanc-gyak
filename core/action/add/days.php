<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if (isset($_POST['button-add-day'])) {
    $day = $_POST['inputDays'];
    $addDays = "INSERT INTO napok(Nap)
                VALUES (:dayz)";

    $run = $databaseConnection -> prepare($addDays);

    $run->bindValue(':dayz', $day);

    $resultset = $run->execute();

    if ($resultSet) {
        header("Location: ../../../protected/dashboard/admin.php");
    }