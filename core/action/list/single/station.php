<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listSingleStation($databaseConnection, $getid)
{
    $listStation = "SELECT 
                        IRSZ,
                        Varos,
                        KozteruletNeve,
                        KozteruletJellege,
                        Hazszam,
                        Epulet,
                        KoordSz,
                        KoordH
                    FROM allomas
                    WHERE ID=:getid";

    $run = $databaseConnection -> prepare($listStation);

    $run->bindValue(':getid', $getid);

    $run->execute();
    $station = $run->fetchAll();

    return $station;
}