<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

    $species = $_POST['inputSpecies'];
    $carrierW = $_POST['inputCarrierW'];
    $carrierH = $_POST['inputCarrierH'];
    $carrierD = $_POST['inputCarrierD'];
    $dangerous = $_POST['inputDangerous'];
    $serious = $_POST['inputSerious'];
    $individualNum = $_POST['inputNumOfIndividuals']; 
    $submit = $_POST['button-add-animal'];
    
    print_r($_POST);

    /*$addAnimal = "INSERT INTO allat (Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam)
                  VALUES (:species, :carrierW, :carrierH, :carrierD, :dangerous, :serious, :individualNum)";

    $run = $databaseConnection -> prepare($addAnimal);

    $run->bindValue(':species', $species);
    $run->bindValue(':carrierW', $carrierW);
    $run->bindValue(':carrierH', $carrierH);
    $run->bindValue(':carrierD', $carrierD);
    $run->bindValue(':dangerous', $dangerous);
    $run->bindValue(':serious', $serious);
    $run->bindValue(':individualNum', $individualNum);

    $resultset = $run->execute();

    if ($resultSet) {
        header("Location: ../../../protected/dashboard/admin.php");
    }*/
}