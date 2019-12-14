<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/core/authentication/utils/logout.php");

session_start();

function sessionAutoExpiry($loginEmail) {
    $expiryTime = 60;

    if (time() - $_SESSION['timestamp'] > $expiryTime) {
        sessionLogout($loginEmail);
    } else {
        $_SESSION['timestamp'] = time();
    }
}
