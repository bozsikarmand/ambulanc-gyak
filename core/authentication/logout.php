<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/authentication/utils/logout.php");

$loginEmail = $_SESSION['email'];

sessionLogout($loginEmail);    



