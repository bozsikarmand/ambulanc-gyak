<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$addAnimal = "SELECT ID, Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam
              FROM allat";

$run = $databaseConnection -> prepare($addAnimal);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);