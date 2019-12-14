<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");

$loginEmail = $_SESSION['email'];

if (array_key_exists('button-logout', $_POST))) {
    sessionLogout($loginEmail);    
} else {
    sessionAutoExpiry($loginEmail);
}


