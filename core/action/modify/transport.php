<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if (isset($_POST['button-add-transport'])) {
    $stage = $_POST['inputStage'];
    $stat = $_POST['inputStat'];

    $addTransport = "INSERT INTO szallitas(Szakasz, Allapot)
                     VALUES(:stage, :stat)";
    
    $run = $databaseConnection -> prepare($addTransport);
    $resultset = $run->execute();

    if ($resultSet) {
        header("Location: ../../../protected/dashboard/admin.php");
    }
}