<?php

session_start();
ob_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/action/get/emailaddress.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/getURL.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/mail/sender.php");

$getID = $_GET['id'];

if (!empty($getID)) {
    $oldStatus = 5;
    $newStatus = 6;
    $approveUser = "UPDATE szemely
                    SET statusz = :newStatus
                    WHERE statusz = :oldStatus 
                    AND ID = :getID";

    $run = $databaseConnection -> prepare($approveUser);

    $run->bindValue(':newStatus', $newStatus);
    $run->bindValue(':oldStatus', $oldStatus);
    $run->bindValue(':getID', $getID);

    $resultSet = $run->execute();

    if ($resultSet) {
        $subject = 'Regisztrált felhasználód elfogadásra került!';
        $body = '<!DOCTYPE html>
        <html lang="hu">

        <head>
            <meta charset="UTF-8">
            <title>Regisztráció megerősitése</title>
            <style>
                .wrapper {
                    padding: 10px;
                    color: #000;
                    font-size: 1.4em;
                }
                a {
                    background: #dd3333;
                    text-decoration: none;
                    padding: 8px 10px;
                    color: #fff;
                }
            </style>
        </head>

        <body>
            <div class="wrapper">
                <p>Köszönjük hogy regisztráltál oldalunkon! Regisztrált felhasználód elfogadásra került!</p>
                    <a href="' . getURL() . '/login.php">A bejelentkezéshez kattints ide!</a>
            </div>
        </body>
        </html>';

        $userEmailAddress = getNotYetApprovedUserEmailAddress($databaseConnection, $getID);
       
        foreach ($userEmailAddress as $email) {
            //echo $email;
            //var_dump($email);
            //print_r($email['BelepesiEmail']);

            $userEmail = $email['BelepesiEmail'];
            $sentMail = sendEmailToUserAfterApproval($userEmail, $subject, $body);
        }

        header("Location:" . getURL() . "/protected/dashboard/admin.php");
    }
}
ob_end_clean();