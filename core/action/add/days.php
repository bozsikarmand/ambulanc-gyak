<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function addDay($databaseConnection, $day)
{
    $addDays = "INSERT INTO napok(Nap)
                VALUES (:day)";

    $run = $databaseConnection -> prepare($addDays);

    $run->bindValue(':day', $day);

    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet
}