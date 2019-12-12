<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if (isset($_POST['button-add-permission'])) {
    $name = $_POST['inputName'];

    $addPermission = "INSERT INTO jog(Nev)
                      VALUES (:namez)";

    $run = $databaseConnection -> prepare($addPermission);

    $run->bindValue(':namez', $name);

    $resultset = $run->execute();

    if ($resultSet) {
        header("Location: /protected/dashboard/admin.php");
    }