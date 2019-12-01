<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listTransports($databaseConnection)
{
    $listTransports = "SELECT 
                            ID, 
                            Szakasz, 
                            Allapot
                       FROM szallitas";

    $run = $databaseConnection -> prepare($listTransports);
    $run->execute();
    $transportlist = $run->fetchAll();

    return $transportlist;
}