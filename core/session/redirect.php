<?php

session_start();

if (!isset($_SESSION["isLoggedIn"]) || empty($_SESSION["isLoggedIn"])) {
    header("Location: ../authentication/login.php");
}