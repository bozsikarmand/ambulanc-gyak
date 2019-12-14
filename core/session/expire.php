<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");

session_start();

$expiryTime = 60;

if (time() - $_SESSION['timestamp'] > $expiryTime) {
    sessionLogout($loginEmail);
} else {
    $_SESSION['timestamp'] = time();
}
