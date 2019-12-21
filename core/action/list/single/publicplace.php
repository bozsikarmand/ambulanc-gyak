<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listSinglePublicPlace($databaseConnection, $getid)
{
    $listPublicPlace = "SELECT 
                        Jelleg
                    FROM kozterulet
                    WHERE ID=:getid";

    $run = $databaseConnection -> prepare($listPublicPlace);

    $run->bindValue(':getid', $getid);

    $run->execute();
    $publicPlace = $run->fetchAll();

    return $publicPlace;
}