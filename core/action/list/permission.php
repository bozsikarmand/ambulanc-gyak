<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listPermissions($databaseConnection)
{
    $listPermissions =  "SELECT ID, Nev
                         FROM jog";

    $run = $databaseConnection -> prepare($listPermissions);
    $run->execute();
    $permissionlist = $run->fetchAll();

    return $permissionlist;
}