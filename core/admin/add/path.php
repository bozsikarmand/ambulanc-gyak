<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$queryPath = "SELECT ID, Indulas, Erkezes, Surgos, Allapot, AtadoSzemely,AtvevoSzemely
              FROM ut";

$run = $databaseConnection -> prepare($queryPath);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);