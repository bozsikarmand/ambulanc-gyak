<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listTransport($databaseConnection, $getid)
{
    $listTransport = "SELECT 
                        Szakasz,
                        Allapot
                    FROM szallitas
                    WHERE ID=:getid";

    $run = $databaseConnection -> prepare($listTransport);

    $run->bindValue(':getid', $getid);

    $run->execute();
    $transport = $run->fetchAll();

    return $transport;
}