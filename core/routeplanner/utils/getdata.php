<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

// Elerheto rendszeres utak lekerese, es sulyok szamitasa az vegidopont es a kezdo idopont kulonbsegebol (elkoltseg)

$currentRole = getRoleInfo($loginEmail, $databaseConnection);

if ($currentRole == $USER) {
    header("Location:" . getURL() . "/core/default/frontend/nopermission.php");
} 

function getStartCities($databaseConnection) {
    $queryStartCities = "SELECT"
}