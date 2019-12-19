<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function getAdminEmailAddress($databaseConnection)
{
    $adminPermission = 2;
    $adminEmailAddress = "SELECT 
                          email.BelepesiEmail
                          FROM email, szemely, szemelyjog 
                          WHERE email.ID = szemely.ID 
                          AND szemely.ID = szemelyjog.SzemelyID
                          AND szemelyjog.JogID = :adminpermission";

    $run = $databaseConnection -> prepare($adminEmailAddress);
    $run->bindValue(':adminpermission', $adminPermission);
    $run->execute();
    $adminemaillist = $run->fetchAll();

    echo $adminemaillist;
    var_dump($adminemaillist);
    print_r($adminemaillist);
}