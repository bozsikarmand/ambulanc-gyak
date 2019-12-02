<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listAnimal($databaseConnection)
{
    $listAnimals = "SELECT 
                        ID as id, 
                        Faj as species, 
                        HordozoSz as carrierw, 
                        HordozoM as carrierh, 
                        HordozoH as carrierd, 
                        Veszelyes as dangerous, 
                        Sulyos as serious, 
                        EgyedSzam as individualNum
                    FROM allat";

    $run = $databaseConnection -> prepare($listAnimals);
    $run->execute();
    $animallist = $run->fetchAll();

    return $animallist;
}