<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if (isset($_POST['button-add-public-place'])) {
    $trait = $_POST['inputTrait'];
    
    $addPublicPlace = "INSERT INTO kozterulet(Jelleg)
                       VALUES (:trait)";

    $run = $databaseConnection -> prepare($addPublicPlace);

    $run->bindValue(':trait', $trait);

    $resultset = $run->execute();

    if ($resultSet) {
        header("Location: ../../../protected/dashboard/admin.php");
    }
}