<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listStations($databaseConnection)
{
    $listStations = "SELECT ID, 
                            IRSZ, 
                            Varos, 
                            KozteruletNeve, 
                            KozteruletJellege, 
                            Hazszam, 
                            Epulet, 
                            KoordSz, 
                            KoordH 
                    FROM allomas";

    $run = $databaseConnection -> prepare($listStations);
    $run->execute();
    $stationlist = $run->fetchAll();

    return $stationlist;
}