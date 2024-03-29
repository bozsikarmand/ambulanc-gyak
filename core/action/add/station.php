<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if (isset($_POST['button-add-station'])) {
    $zipcode = $_POST['inputZIPCode'];
    $city = $_POST['inputCity'];
    $publicplacename = $_POST['inputPublicPlaceName'];
    $publicplacetrait = $_POST['inputPublicPlaceTrait'];
    $housenumber = $_POST['inputHouseNumber'];
    $buildingletter = $_POST['inputBuildingLetter'];
    $coordW = $_POST['inputCoordW'];
    $coordH = $_POST['inputCoordH'];

    $addStation = "INSERT INTO allomas(IRSZ, Varos, KozteruletNeve, KozteruletJellege, Hazszam, Epulet, KoordSz, KoordH) 
    VALUES(:zip, :city, :publicplacename, :publicplacetrait, :housenumber, :buildingletter, :coordW, :coordH)";

    $run = $databaseConnection -> prepare($addStation);

    $run->bindValue(':zip', $zipcode);
    $run->bindValue(':city', $city);
    $run->bindValue(':publicplacename', $publicplacename);
    $run->bindValue(':publicplacetrait', $publicplacetrait);
    $run->bindValue(':housenumber', $housenumber);
    $run->bindValue(':buildingletter', $buildingletter);
    $run->bindValue(':coordW', $coordW);
    $run->bindValue(':coordH', $coordH);

    $resultSet = $run->execute();

    if ($resultSet) {
        header("Location: /protected/dashboard/admin.php");
    }
}