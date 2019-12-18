<?php 

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function viewProfileDataForUser($databaseConnection, $sessionKey)
{
    $listProfileData = "SELECT
                        szemely.Vezeteknev,
                        szemely.Keresztnev,
                        szemely.Utonev,
                        szemely.VezetekesTel, 
                        szemely.MobilTel, 
                        szemely.IRSZ,
                        szemely.Varos,
                        szemely.KozteruletNeve,
                        szemely.KozteruletJellege,
                        szemely.Hazszam,
                        szemely.Epulet  
                        FROM szemely, szemelymunkamenet, munkamenet
                        WHERE szemely.ID = szemelymunkamenet.SzemelyID 
                        AND szemelymunkamenet.MunkamenetID = munkamenet.MunkamenetID 
                        AND munkamenet.MunkamenetKulcs=:sessionKey";

    $run = $databaseConnection -> prepare($listProfileData);

    $run->bindValue(':sessionKey', $sessionKey);

    $run->execute();
    $userlist = $run->fetchAll();

    return $userlist;
}

function viewProfileDataForAdmin($databaseConnection, $getID)
{
    $listProfileData = "SELECT
                        szemely.Vezeteknev,
                        szemely.Keresztnev,
                        szemely.Utonev,
                        szemely.VezetekesTel, 
                        szemely.MobilTel, 
                        szemely.IRSZ,
                        szemely.Varos,
                        szemely.KozteruletNeve,
                        szemely.KozteruletJellege,
                        szemely.Hazszam,
                        szemely.Epulet  
                        FROM szemely
                        WHERE szemely.ID = :getID";

    $run = $databaseConnection -> prepare($listProfileData);

    $run->bindValue(':getID', $getID);

    $run->execute();
    $userlist = $run->fetchAll();

    return $userlist;
}