<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listUserProfile($databaseConnection, $sessionKey)
{
    $sessionKeyDataModification = getSessionKeyDataModification($databaseConnection, $sessionKey);
    $listProfileData = "SELECT
                               szemely.VezetekesTel as landlinetel, 
                               szemely.MobilTel as mobiletel, 
                               szemely.IRSZ as zipcode,
                               szemely.Varos as city,
                               szemely.KozteruletNeve as publicplacename,
                               szemely.KozteruletJellege as publicplacetrait,
                               szemely.Hazszam as housenumber,
                               szemely.Epulet as building  
                               FROM szemely, szemelymunkamenet, munkamenet
                               WHERE szemely.ID = szemelymunkamenet.SzemelyID 
                               AND szemelymunkamenet.ID = munkamenet.ID 
                               AND munkamenet.MunkamenetKulcsAdatmodositas=:sessionKeyDataModification";

    $run = $databaseConnection -> prepare($listAvailableUsers);

    $run->bindValue(':sessionKeyDataModification', $sessionKeyDataModification);

    $run->execute();
    $userlist = $run->fetchAll();

    return $userlist;
}