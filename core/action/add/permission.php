<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function addPermission($databaseConnection, $name)
{
    $addPermission = "INSERT INTO jog(Nev)
                      VALUES (:name)";

    $run = $databaseConnection -> prepare($addPermission);

    $run->bindValue(':name', $name);

    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet;
}