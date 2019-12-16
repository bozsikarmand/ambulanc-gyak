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
    $selectPath = "SELECT 
                    Indulas, 
                    Erkezes, 
                    Surgos, 
                    Allapot, 
                    AtadoSzemely, 
                    AtvevoSzemely
                    FROM ut
                    WHERE ID = :getid";

    $run = $databaseConnection -> prepare($selectPath);

    $run->bindValue(':getid', $getID);
        
    $resultSet = $run->execute();

    if (isset($getConfirm)) {
        if ($resultSet && $getConfirm == 'yes') {
            $deletePath = "DELETE 
                           FROM ut
                           WHERE ID=:getid";
            
            $run = $databaseConnection -> prepare($deletePath);

            $run->bindValue(':getid', $getID);
    
            $resultSet = $run->execute();
    
            if ($resultSet) {
                header("Location: /protected/dashboard/admin.php");
            }
        } else if ($resultSet && $getConfirm == 'no') {
            header("Location: /protected/dashboard/functions/admin/list/path.php");
        }
    }
}