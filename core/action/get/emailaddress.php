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

    return $adminemaillist;
}

function getNotYetApprovedUserEmailAddress($databaseConnection, $userID)
{
    $userPermission = 1;
    $userStatus = 6;
    $ID = $userID; 
    $userEmailAddress = "SELECT 
                          email.BelepesiEmail
                          FROM email, szemely, szemelyjog 
                          WHERE email.ID = szemely.ID 
                          AND szemely.ID = szemelyjog.SzemelyID
                          AND szemelyjog.JogID = :userpermission
                          AND szemely.ID=:ID";

    $run = $databaseConnection -> prepare($userEmailAddress);
    $run->bindValue(':userpermission', $userPermission);
    $run->bindValue(':ID', $ID);
    $run->execute();
    $useremaillist = $run->fetchAll();

    return $useremaillist;
}