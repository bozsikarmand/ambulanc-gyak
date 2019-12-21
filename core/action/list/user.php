<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listUser($databaseConnection)
{
    $stat = 6;
    $listAvailableUsers = "SELECT 
                           ID as id, 
                           CONCAT(
                               szemely.Vezeteknev, 
                               SPACE(1), 
                               szemely.Keresztnev, 
                               SPACE(1), 
                               szemely.Utonev
                               ) as fullname
                               FROM szemely
                               WHERE statusz=:stat";

    $run = $databaseConnection -> prepare($listAvailableUsers);

    $run->bindValue(':stat', $stat);

    $run->execute();
    $userlist = $run->fetchAll();

    return $userlist;
}

function listUserWaitingForApproval($databaseConnection)
{
    $stat = 5;
    $listAvailableUsersWaitingForApproval = "SELECT 
                                             ID as id, 
                                             CONCAT(
                                             szemely.Vezeteknev, 
                                             SPACE(1), 
                                             szemely.Keresztnev, 
                                             SPACE(1), 
                                             szemely.Utonev
                                             ) as fullname
                                             FROM szemely
                                             WHERE szemely.Statusz = :stat";

    $run = $databaseConnection -> prepare($listAvailableUsersWaitingForApproval);

    $run->bindValue(':stat', $stat);

    $run->execute();
    $userlist = $run->fetchAll();

    return $userlist;
}