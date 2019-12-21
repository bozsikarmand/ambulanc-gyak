<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listSingleDay($databaseConnection, $getid)
{
    $listDay = "SELECT Nap
                FROM napok
                WHERE ID=:getid";

    $run = $databaseConnection -> prepare($listDay);

    $run->bindValue(':getid', $getid);

    $run->execute();
    $day = $run->fetchAll();

    return $day;
}