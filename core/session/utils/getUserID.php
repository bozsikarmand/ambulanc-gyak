<?php 

function getUserID($loginEmail) {
    $queryID = "SELECT ID as id 
                FROM szemely 
                JOIN email
                ON szemely.ID = email.ID
                WHERE email.BelepesiEmail=:loginemail";
    
    $run = $databaseConnection->prepare($queryID);
        
    $run->bindValue(':loginEmail', $loginEmail);
    $resultSet = $run->execute();

    return $resultSet['id'];
}