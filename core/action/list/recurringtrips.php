<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listRecurringTrips($databaseConnection)
{
    $listRecurringTrips =  "SELECT ID, 
                                IndVaros, 
                                ErkVaros, 
                                IndDatum, 
                                ErkDatum, 
                                IndIdo, 
                                ErkIdo, 
                                HetiRendszeresseg, 
                                Hely
                         FROM rendszeresut";

    $run = $databaseConnection -> prepare($listRecurringTrips);
    $run->execute();
    $recurringtripslist = $run->fetchAll();

    return $recurringtripslist;
}