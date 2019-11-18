<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/getURL.php");

if (!isset($_SESSION["isLoggedIn"]) || empty($_SESSION["isLoggedIn"])) {
    header("Location:" . getURL() . "/core/authentication/login.php");
}