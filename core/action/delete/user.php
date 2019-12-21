<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$getID = $_GET['id'];

if (!empty($getID)) {
    $oldStatus = 6;
    $newStatus = -2;
    $rejectUser = "UPDATE szemely
                   SET statusz = :newStatus
                   WHERE statusz = :oldStatus 
                   AND ID = :getID";

    $run = $databaseConnection -> prepare($rejectUser);

    $run->bindValue(':newStatus', $newStatus);
    $run->bindValue(':oldStatus', $oldStatus);
    $run->bindValue(':getID', $getID);

    $resultSet = $run->execute();

    if ($resultSet) {
        header("Location: /protected/dashboard/admin.php");
    }
}

