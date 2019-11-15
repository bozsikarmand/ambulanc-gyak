<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$loginEmail = $_SESSION["email"];

$queryName = "SELECT email.BelepesiEmail as le, 
                CONCAT(szemely.Vezeteknev, 
                       SPACE(1), 
                       szemely.Keresztnev, 
                       SPACE(1), 
                       szemely.Utonev) as fullname 
              FROM email, szemely 
              WHERE szemely.ID = email.ID 
              AND BelepesiEmail=:loginemail";

$run = $databaseConnection -> prepare($queryName);
$run->bindValue(':loginemail', $loginEmail);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);

$fullname = $resultSet['fullname'];