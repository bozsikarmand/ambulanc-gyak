<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/authentication/utils/logout.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/get.php");

session_start();

$loginEmail = $_SESSION['email'];
$expiryTime = 60;

// $_SESSION['timestamp']

$loginTimeStamp = sessionGetUserLoginTimeStamp($loginEmail, $databaseConnection);

if (time() - $loginTimeStamp > $expiryTime) {
    sessionLogout($loginEmail);
} else {
    $_SESSION['timestamp'] = time();
}
