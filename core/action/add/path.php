<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function addPath($databaseConnection, $startpoint, $endpoint, $important, $stat, $givePerson, $takePerson)
{
    $addPath = "INSERT INTO ut(Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)
                VALUES (:startpoint, :endpoint, :important, :stat, :givePerson, :takePerson)";

    $run = $databaseConnection -> prepare($addPath);

    $run->bindValue(':startpoint', $startpoint);
    $run->bindValue(':endpoint', $endpoint);
    $run->bindValue(':important', $important);
    $run->bindValue(':stat', $stat);
    $run->bindValue(':givePerson', $givePerson);
    $run->bindValue(':takePerson', $takePerson);

    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet;
}