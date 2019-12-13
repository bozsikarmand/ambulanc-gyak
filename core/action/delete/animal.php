<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$getID = $_GET['id'];

if (isset($getID)) {
    if (!empty($_POST['button-delete-animal'])) {
        $selectAnimal = "SELECT 
                            Faj, 
                            HordozoSz, 
                            HordozoM, 
                            HordozoH, 
                            Veszelyes, 
                            Sulyos, 
                            EgyedSzam 
                         FROM allat
                         WHERE ID = :getid";

        $run = $databaseConnection -> prepare($selectAnimal);

        $run->bindValue(':getid', $getID);
        
        $resultSet = $run->execute();

        $deleteAnimal = "INSERT INTO allat (Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam)
                    VALUES (:species, :carrierW, :carrierH, :carrierD, :dangerous, :serious, :individualNum)";

        if ($resultSet) {
            header("Location: /protected/dashboard/admin.php");
        }
    }
}