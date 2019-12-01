<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listPublicPlace($databaseConnection)
{
    $listPublicPlaces =  "SELECT ID, Jelleg
                          FROM kozterulet";

    $run = $databaseConnection -> prepare($listPublicPlaces);
    $run->execute();
    $publicplacelist = $run->fetchAll();

    return $publicplacelist;
}