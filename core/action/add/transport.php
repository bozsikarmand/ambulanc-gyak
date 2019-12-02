<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$queryPublicPlace = "INSERT INTO szallitas(Szakasz, Allapot)
                     VALUES(:stage, :stat)";

$run = $databaseConnection -> prepare($queryPublicPlace);

$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);