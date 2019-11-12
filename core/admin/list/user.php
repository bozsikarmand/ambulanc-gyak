<?php

require_once ("../../database/config.php");

$listAvailableUsers = "SELECT 
                            ID as id, 
                            CONCAT(
                                szemely.Vezeteknev, 
                                SPACE(1), 
                                szemely.Keresztnev, 
                                SPACE(1), 
                                szemely.Utonev
                                ) as fullname
                       FROM szemely";

$run = $databaseConnection -> prepare($listAvailableUsers);
$run->execute();
    
