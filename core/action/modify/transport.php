<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$queryPublicPlace = "SELECT ID, Szakasz, Allapot
                     FROM szallitas";

$run = $databaseConnection -> prepare($queryPublicPlace);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);