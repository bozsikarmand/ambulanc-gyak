<?php


    session_start();

    $active = 1;
    $inactive = 0;

    $endSession = "UPDATE munkamenet
                    SET MunkamenetVege=:endtime,
                        Aktiv=:inactive
                    WHERE MunkamenetVege IS NULL 
                    AND Aktiv = :active"; 

    $run = $databaseConnection -> prepare($endSession);
    $run->bindValue(':endtime', $endtime);
    $run->bindValue(':inactive', $inactive);
    $run->bindValue(':active', $active);
    $run->execute();

    session_unset();
    session_destroy();

    header('Location: /index.php');
