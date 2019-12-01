<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listUser($databaseConnection)
{
    $listAvailableUsers = "SELECT 
                           ID as id, 
                           CONCAT(
                               szemely.Vezeteknev, 
                               SPACE(1), 
                               szemely.Keresztnev, 
                               SPACE(1), 
                               szemely.Utonev
                               ) as fullname
                               FROM szemely";

    $run = $databaseConnection -> prepare($listAvailableUsers);
    $run->execute();
    $userlist = $run->fetchAll();

    return $userlist;
}