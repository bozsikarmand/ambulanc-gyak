<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$getID = $_GET['id'];
$getConfirm = $_GET['confirm'];

if (isset($getID)) {
    $selectUser = "SELECT 
                   Statusz
                   FROM szemely
                   WHERE ID = :getid";

    $run = $databaseConnection -> prepare($selectUser);

    $run->bindValue(':getid', $getID);
        
    $resultSet = $run->execute();

    if (isset($getConfirm)) {
        if ($resultSet && $getConfirm == 'yes') {
            $oldStatus = 6;
            $newStatus = -2;
            $deleteUser = "UPDATE szemely
                        SET statusz = :newStatus
                        WHERE statusz = :oldStatus 
                        AND ID = :getID";

            $run = $databaseConnection -> prepare($deleteUser);

            $run->bindValue(':newStatus', $newStatus);
            $run->bindValue(':oldStatus', $oldStatus);
            $run->bindValue(':getID', $getID);
    
            $resultSet = $run->execute();
    
            if ($resultSet) {
                header("Location: /protected/dashboard/admin.php");
            }
        } else if ($resultSet && $getConfirm == 'no') {
            header("Location: /protected/dashboard/functions/admin/list/users.php");
        }
    }
}