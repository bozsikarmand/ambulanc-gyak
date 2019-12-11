<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/action/list/days.php");

if (isset($_POST['button-modify-day'])) {
    $id = $_GET['id'];

    $daylist = listDays($databaseConnection);
    
    $oldDay = $daylist['Nap'];

    $day = $_POST['inputDays'];
    $addDays = "INSERT INTO napok(Nap)
                VALUES (:dayz)";

    $run = $databaseConnection -> prepare($addDays);

    $run->bindValue(':dayz', $day);

    $resultset = $run->execute();

    if ($resultSet) {
        header("Location: ../../../protected/dashboard/admin.php");
    }