<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listDays($databaseConnection)
{
    $listDays =  "SELECT ID, Nap
                  FROM napok";

    $run = $databaseConnection -> prepare($listDays);
    $run->execute();
    $daylist = $run->fetchAll();

    return $daylist;
}