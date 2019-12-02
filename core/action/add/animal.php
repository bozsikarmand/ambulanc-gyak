<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function addAnimal($databaseConnection, $species, $carrierW, $carrierW, $carrierH, $carrierD, $dangerous, $serious, $individualNum)
{
    $addAnimal = "INSERT INTO allat (Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam)
                  VALUES (:species, :carrierW, :carrierH, :carrierD, :dangerous, :serious, :individualNum)";

    $run = $databaseConnection -> prepare($addAnimal);

    $run->bindValue(':species', $species);
    $run->bindValue(':carrierW', $carrierW);
    $run->bindValue(':carrierH', $carrierH);
    $run->bindValue(':carrierD', $carrierD);
    $run->bindValue(':dangerous', $dangerous);
    $run->bindValue(':serious', $serious);
    $run->bindValue(':individualNum', $individualNum);

    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet;
}
