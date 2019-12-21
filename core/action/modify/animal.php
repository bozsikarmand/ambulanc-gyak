<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$getID = $_GET['id'];

if (isset($getID)) {
    if (isset($_POST['button-modify-animal'])) {
        $species = $_POST['inputSpecies'];
        $carrierW = $_POST['inputCarrierW'];
        $carrierH = $_POST['inputCarrierH'];
        $carrierD = $_POST['inputCarrierD'];
        $dangerous = $_POST['inputDangerous'];
        $serious = $_POST['inputSerious'];
        $individualNum = $_POST['inputNumOfIndividuals'];

        $updateAnimal = "UPDATE allat
                         SET Faj = :species, 
                             HordozoSz = :carrierW, 
                             HordozoM = :carrierH, 
                             HordozoH = :carrierD, 
                             Veszelyes = :dangerous, 
                             Sulyos = :serious, 
                             EgyedSzam = :individualNum
                        WHERE ID = :getid";

        $run = $databaseConnection -> prepare($updateAnimal);

        $run->bindValue(':species', $species);
        $run->bindValue(':carrierW', $carrierW);
        $run->bindValue(':carrierH', $carrierH);
        $run->bindValue(':carrierD', $carrierD);
        $run->bindValue(':dangerous', $dangerous);
        $run->bindValue(':serious', $serious);
        $run->bindValue(':individualNum', $individualNum);
            
        $resultSet = $run->execute();
        
        if ($resultSet) {
            header("Location: /protected/dashboard/admin.php");
        }
    }
}