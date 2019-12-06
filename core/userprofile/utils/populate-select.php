<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function populateSelect($databaseConnection)
{
    $listPublicPlaceTraits = "SELECT 
                              ID as id, 
                              Jelleg as trait
                              FROM kozterulet";

    $run = $databaseConnection -> prepare($listPublicPlaceTraits);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet;
}