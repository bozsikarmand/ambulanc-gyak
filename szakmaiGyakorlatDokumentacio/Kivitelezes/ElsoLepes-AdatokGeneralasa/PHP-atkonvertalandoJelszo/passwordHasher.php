<?php

/**
 * A rendszerteszthez generalt jelszavak hashelese
 *
 * Bemenet: jelszo.txt
 * Kimenet: hasheltJelszo.txt
 *
 * Keszitette: Bozsik Armand Viktor
 * Datum: 2019-09-24
 */

$array = file("jelszo.txt");

foreach ($array as $pass) {
    echo password_hash($pass, PASSWORD_BCRYPT) . "<br>";
}