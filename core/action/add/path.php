<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if (isset($_POST['button-add-path'])) {
    $startpoint = $_POST['inputStartPoint'];
    $endpoint = $_POST['inputEndPoint'];
    $important = $_POST['inputImportant'];
    $stat = $_POST['inputStat'];
    $givePerson = $_POST['inputGivePerson'];
    $takePerson = $_POST['inputTakePerson'];

    $addPath = "INSERT INTO ut(Indulas, Erkezes, Surgos, Allapot, AtadoSzemely, AtvevoSzemely)
                VALUES (:startpoint, :endpoin, :important, :stat, :givePerson, :takePerson)";

    $run = $databaseConnection -> prepare($addPath);

    $run->bindValue(':startpoint', $startpoint);
    $run->bindValue(':endpoin', $endpoint);
    $run->bindValue(':important', $important);
    $run->bindValue(':stat', $stat);
    $run->bindValue(':givePerson', $givePerson);
    $run->bindValue(':takePerson', $takePerson);

    $run->execute();
    
    $resultset = $run->execute();

    if ($resultSet) {
        header("Location: ../../../protected/dashboard/admin.php");
    }
}