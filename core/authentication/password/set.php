<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/getURL.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/utils/getUserData.php");

if (isset($_POST['button-password-set'])) {
    if (empty($_POST['inputPassword'])) {
        $error['inputPassword'] = 'Jelszó megadása kötelező';
    }
    if (empty($_POST['inputPasswordConfirmation'])) {
        $error['inputPasswordConfirmation'] = 'A jelszó újbóli megadása kötelező';
    }
    if (isset($_POST['inputPassword']) &&
        $_POST['inputPassword'] !== $_POST['inputPasswordConfirmation']) {
        $error['passwordsDoNotMatch'] = 'A megadott két jelszó nem egyezik!';
    }
    
    $token = $_SESSION['sessToken'];
    //print_r($_SESSION);
    $newPassword = $_POST['inputPassword'];
    $loginEmail = getUserEmail($token, $databaseConnection);
    $getid = getUserID($loginEmail, $databaseConnection);

    if (isset($token)) {
        $password = password_hash($newPassword, PASSWORD_DEFAULT);

        // Jelszo hash
        $updatePasswordHash = "UPDATE szemely sz, jelszo j
                               SET j.JelszoHash = :passwordhash
                               WHERE sz.HitelesitoKod = :token
                               AND sz.ID = :getid
                               AND sz.ID = j.ID";
        $run = $databaseConnection->prepare($updatePasswordHash);

        $run->bindValue(':passwordhash', $password);
        $run->bindValue(':token', $token);
        $run->bindValue(':getid', $getid);

        $resultSet = $run->execute();

        if ($resultSet) {
            header("Location:" . getURL() . "/login.php");
        } else {
            echo "Ures!";
        }
    }

    echo $loginEmail;
    echo $getid;
}

    