<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/action/list/animal.php");

if (isset($_POST['button-modify-animal'])) {
    $id = $_GET['id'];

    $animallist = listAnimal($databaseConnection);
    
    $oldSpecies = $animallist['Faj'];
    $oldCarrierW = $animallist['HordozoSz'];
    $oldCarrierH = $animallist['HordozoM'];
    $oldCarrierD = $animallist['HordozoH'];
    $oldDangerous = $animallist['Veszelyes'];
    $oldSerious = $animallist['Sulyos'];
    $oldIndividualNum = $animallist['EgyedSzam'];

    $species = $_POST['species'];
    $carrierW = $_POST['carrierW'];
    $carrierH = $_POST['carrierH'];
    $carrierD = $_POST['carrierD'];
    $dangerous = $_POST['dangerous'];
    $serious = $_POST['serious'];
    $individualNum = $_POST['individualNum']; 
    
    $updateAnimal = "UPDATE allat (Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam)
                     SET allat.Faj = :species, 
                         allat.HordozoSz = :carrierW, 
                         allat.HordozoM = :carrierH, 
                         allat.HordozoH = :carrierD, 
                         allat.Veszelyes = :dangerous, 
                         allat.Sulyos = :serious, 
                         allat.EgyedSzam = :individualNum
                    WHERE allat.Faj IS NULL OR allat.Faj = :oldSpecies AND
                          allat.HordozoSz IS NULL OR allat.HordozoSz = :oldCarrierW AND
                          allat.HordozoM IS NULL OR allat.HordozoM = :oldCarrierH AND
                          allat.HordozoH IS NULL OR allat.HordozoH = :oldCarrierD AND
                          allat.Veszelyes IS NULL OR allat.Veszelyes = :oldDangerous AND
                          allat.Sulyos IS NULL OR allat.Sulyos = :oldSerious AND
                          allat.EgyedSzam IS NULL OR allat.EgyedSzam = :oldIndividualNum AND
                          allat.ID = :id";

    $run = $databaseConnection -> prepare($updateAnimal);

    $run->bindValue(':species', $species);
    $run->bindValue(':carrierW', $carrierW);
    $run->bindValue(':carrierH', $carrierH);
    $run->bindValue(':carrierD', $carrierD);
    $run->bindValue(':dangerous', $dangerous);
    $run->bindValue(':serious', $serious);
    $run->bindValue(':individualNum', $individualNum);

    $run->bindValue(':oldSpecies', $oldSpecies);
    $run->bindValue(':oldCarrierW', $oldCarrierW);
    $run->bindValue(':oldCarrierH', $oldCarrierH);
    $run->bindValue(':oldCarrierD', $oldCarrierD);
    $run->bindValue(':oldDangerous', $oldDangerous);
    $run->bindValue(':oldSerious', $oldSerious);
    $run->bindValue(':oldIndividualNum', $oldIndividualNum);

    $run->bindValue(':id', $id);

    $resultset = $run->execute();

    if ($resultSet) {
        header("Location: ../../../protected/dashboard/admin.php");
    }
}