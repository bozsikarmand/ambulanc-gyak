<?php

session_start();
require_once ('../database/config.php');

$connectiom = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_errno())
{
    die('Hiba! Nem sikerult a MySQL szerverhez valo csatlakozas!');
}

if (!isset($_POST['inputUsername'], $_POST['inputPassword']))
{
    die('A mezok kitoltese kotelezo!');
}

// SELECT Szemely.ID, Felhasznalonev, JelszoHash
// FROM szemely, jelszo
// WHERE szemely.ID = jelszo.ID

if ($preparedStatement = $connectiom->prepare('SELECT '))