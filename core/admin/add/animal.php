<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$queryAnimal = "SELECT ID, Faj, HordozoSz, HordozoM, HordozoH, Veszelyes, Sulyos, EgyedSzam
                FROM allat";

$run = $databaseConnection -> prepare($queryAnimal);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);