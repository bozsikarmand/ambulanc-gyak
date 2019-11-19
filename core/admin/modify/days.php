<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$queryDays = "SELECT ID, Nap
              FROM napok";

$run = $databaseConnection -> prepare($queryDays);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);