<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$addAnimal = "INSERT INTO allat (Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam)
              VALUES (:species, :carrierW, :carrierH, :carrierD, :dangerous, :serious, :indinvidualNum);

$run = $databaseConnection -> prepare($addAnimal);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);