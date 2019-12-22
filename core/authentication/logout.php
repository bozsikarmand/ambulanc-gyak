<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");

$loginEmail = $_SESSION['email'];

$endtime = date('Y-m-d H:i:s');
$active = 1;
$inactive = 0;

$selectCurrentSession = "SELECT munkamenet.MunkamenetID
                         FROM munkamenet, szemelymunkamenet, szemely, email
                         WHERE munkamenet.MunkamenetVege IS NULL 
                         AND munkamenet.Aktiv = :active
                         AND munkamenet.MunkamenetID = szemelymunkamenet.MunkamenetID 
                         AND szemelymunkamenet.SzemelyID = szemely.ID
                         AND szemely.ID = email.ID 
                         AND BelepesiEmail=:loginemail
                         ORDER BY munkamenet.MunkamenetID DESC
                         LIMIT 1";

$run = $databaseConnection -> prepare($selectCurrentSession);

$run->bindValue(':active', $active);
$run->bindValue(':loginemail', $loginEmail);

$run->execute();
$currentSession = $run->fetchColumn(0);

print_r($currentSession);

/*$endSession = "UPDATE munkamenet, szemelymunkamenet, szemely, email
               SET munkamenet.MunkamenetVege=:endtime,
                   munkamenet.Aktiv=:inactive
               WHERE munkamenet.MunkamenetVege IS NULL 
               AND munkamenet.Aktiv = :active
               AND munkamenet.MunkamenetID = szemelymunkamenet.MunkamenetID 
               AND szemelymunkamenet.SzemelyID = szemely.ID
               AND szemely.ID = email.ID 
               AND BelepesiEmail=:loginemail"; 

$run = $databaseConnection -> prepare($endSession);
$run->bindValue(':endtime', $endtime);
$run->bindValue(':inactive', $inactive);
$run->bindValue(':active', $active);
$run->bindValue(':loginemail', $loginEmail);
$run->execute();

session_destroy();
session_unset();

header('Location: /index.php');*/


