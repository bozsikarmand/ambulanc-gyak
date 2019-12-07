<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/getURL.php");

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
    $newPassword = $_POST['inputPassword'];

    if (isset($token)) {
        $password = password_hash($newPassword, PASSWORD_DEFAULT);

        // Jelszo hash
        $updatePasswordHash = "UPDATE szemely sz
                            JOIN jelszo j
                            ON sz.ID = j.ID
                            SET j.JelszoHash = :passwordhash";
        $run = $databaseConnection->prepare($updatePasswordHash);

        $run->bindValue(':passwordhash', $password);
        $run->bindValue(':token', $token);
        $resultSet = $run->execute();

        if ($resultSet) {
            header("Location:" . getURL() . "/login.php");
        } else {
            echo "Ures!";
        }
    }
}

    