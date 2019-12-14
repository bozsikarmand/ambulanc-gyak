<?php

function sessionLogout($loginEmail) {
    session_start();

    require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");

    $endtime = date('Y-m-d H:i:s');
    $active = 1;
    $inactive = 0;

    $endSession = "UPDATE munkamenet, szemelymunkamenet, szemely, email
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

    header('Location: /index.php');
}
    
