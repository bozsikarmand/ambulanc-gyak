<?php

/**
 * Keszitette: Bozsik Armand Viktor
 * Leiras: Adatbazis kapcsolatot valositok meg. A z alabb lathato valtozokat modositva rugalmasan konfiguralhato a rendszer.
 * Az install szkript ebbe ir!
 */

define('DATABASE_HOST', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', '');
define('DATABASE_NAME', 'ambulanc');

function DatabaseConnection()
{
    try {
        $database = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME.'', DATABASE_USER, DATABASE_PASSWORD);
        return $database;
    } catch (PDOException $ex) {
        return 'Hiba tortent az adatbaziskapcsolat letesitese kozben! Kerem ellenorizze, megadott adatai helyesseget! Bovebb informacio: ' . $ex->getMessage();
        die(); 
    }
}

