<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function queryUserData($sessionKey, $databaseConnection)
{
    $queryUserData = "SELECT email.BelepesiEmail as le,
                         email.PublikusEmail as pe,
                         szemely.Felhasznalonev as un, 
                         szemely.Vezeteknev as fn, 
                         szemely.Keresztnev as ln, 
                         szemely.Utonev as mn, 
                         szemely.VezetekesTel as lt, 
                         szemely.MobilTel as mt, 
                         szemely.IRSZ as zip, 
                         szemely.Varos as city, 
                         szemely.KozteruletNeve as pn, 
                         szemely.Hazszam as hn, 
                         szemely.Epulet as bn, 
                  FROM email, szemely, szemelymunkamenet, munkamenet
                  WHERE szemely.ID = email.ID 
                  AND szemely.ID = szemelymunkamant.Szemely.ID 
                  AND szemelymunkamenet.MunkamenetID = munkamenet.MunkamenetID 
                  AND munkamenet.MunkamenetKulcs=:sessionkey";

$run = $databaseConnection -> prepare($queryUserData);
$run->bindValue(':sessionkey', $sessionKey);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);

return $resultSet;
}