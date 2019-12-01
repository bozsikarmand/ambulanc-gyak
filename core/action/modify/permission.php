<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$queryPermission = "SELECT ID, Nev
                    FROM jog";

$run = $databaseConnection -> prepare($queryPermission);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);