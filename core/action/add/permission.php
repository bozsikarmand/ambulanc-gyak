<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if (isset($_POST['button-add-permission'])) {
    $name = $_POST['inputName'];

    $addPermission = "INSERT INTO jog(Nev)
                      VALUES (:namez)";

    $run = $databaseConnection -> prepare($addPermission);

    $run->bindValue(':namez', $name);

    $resultset = $run->execute();

    if ($resultSet) {
        header("Location: ../../../protected/dashboard/admin.php");
    }
}