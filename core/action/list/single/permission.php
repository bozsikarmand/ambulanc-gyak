<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listSinglePermission($databaseConnection, $getid)
{
    $listPermission = "SELECT 
                        Nev
                    FROM jog
                    WHERE ID=:getid";

    $run = $databaseConnection -> prepare($listPermission);

    $run->bindValue(':getid', $getid);

    $run->execute();
    $permission = $run->fetchAll();

    return $permission;
}