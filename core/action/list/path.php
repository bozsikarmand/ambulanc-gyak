<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listPath($databaseConnection)
{
    $listPaths =  "SELECT 
                    ID, 
                    Indulas, 
                    Erkezes, 
                    Surgos, 
                    Allapot, 
                    AtadoSzemely,
                    AtvevoSzemely
                  FROM ut";

    $run = $databaseConnection -> prepare($listPaths);
    $run->execute();
    $pathlist = $run->fetchAll();

    return $pathlist;
}
// OK