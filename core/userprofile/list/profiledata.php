<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$loginEmail = $_SESSION["email"];

$queryUserData = "SELECT email.BelepesiEmail as le, 
                         szemely.Felhasznalonev as un, 
                         szemely.Vezeteknev as fn, 
                         szemely.Keresztnev as ln, 
                         szemely.Utonev as mn, 
                         szemely.VezetekesTel as lt, 
                         szemely.MobilTel as mt, 
                         szemely.IRSZ as zip, 
                         szemely.Varos as city, 
                         szemely.KozteruletNeve as pn, 
                         szemely.KozteruletJellege as pt, 
                         szemely.Hazszam as hn, 
                         szemely.Epulet as bn, 
                         szemely.UtolsoBelepesIdopontja as lld
                  FROM email, szemely
                  WHERE szemely.ID = email.ID 
                  AND BelepesiEmail=:loginemail";

$run = $databaseConnection -> prepare($queryUserData);
$run->bindValue(':loginemail', $loginEmail);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);


