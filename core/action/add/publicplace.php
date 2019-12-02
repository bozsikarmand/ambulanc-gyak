<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function addPublicPlace($databaseConnection, $trait)
{
    $addPublicPlace = "INSERT INTO kozterulet(Jelleg)
                       VALUES (:trait)";

    $run = $databaseConnection -> prepare($addPublicPlace);

    $run->bindValue(':trait', $trait);

    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet;
}