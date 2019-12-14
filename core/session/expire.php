<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/authentication/utils/logout.php");

session_start();

$expiryTime = 60;

if (time() - $_SESSION['timestamp'] > $expiryTime) {
    sessionLogout($loginEmail);
} else {
    $_SESSION['timestamp'] = time();
}
