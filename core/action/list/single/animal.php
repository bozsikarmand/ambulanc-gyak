<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function listSingleAnimal($databaseConnection, $getid)
{
    $listAnimal = "SELECT 
                        Faj, 
                        HordozoSz, 
                        HordozoM, 
                        HordozoH, 
                        Veszelyes, 
                        Sulyos, 
                        EgyedSzam
                    FROM allat
                    WHERE ID=:getid";

    $run = $databaseConnection -> prepare($listAnimal);

    $run->bindValue(':getid', $getid);

    $run->execute();
    $animal = $run->fetchAll();

    return $animal;
}