<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listAnimal($databaseConnection)
{
    $listAnimals = "SELECT 
                        ID, 
                        Faj, 
                        HordozoSz, 
                        HordozoM, 
                        HordozoH, 
                        Veszelyes, 
                        Sulyos, 
                        EgyedSzam
                    FROM allat";

    $run = $databaseConnection -> prepare($listAnimals);
    $run->execute();
    $animallist = $run->fetchAll();

    return $animallist;
}