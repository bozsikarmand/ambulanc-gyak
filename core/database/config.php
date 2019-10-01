<?php

/**
 * Keszitette: Bozsik Armand Viktor
 * Leiras: Adatbazis kapcsolatot valositok meg. A z alabb lathato valtozokat modositva rugalmasan konfiguralhato a rendszer.
 * Az install szkript ebbe ir!
 */

define('DATABASE_HOST', 'localhost');
define('DATABASE_USER',  'bozsika_ambulanc');
define('DATABASE_PASS', 'bozsikaambulanc');
define('DATABASE_NAME', 'ambulanc');

$PDOOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

try {
    $databaseConnection = new PDO("mysql:host=" . DATABASE_HOST . ";dbname=" . DATABASE_NAME, DATABASE_USER, DATABASE_PASS, $PDOOptions);
} catch (PDOException $ex) {
    die("Hiba tortent az adatbazis kapcsolat letesitese soran: " . $ex->getMessage());
}
