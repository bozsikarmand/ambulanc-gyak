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

function getBrowser() {
    $result = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
    $humanReadableResult = $result->toString();
    return $humanReadableResult;
}

function getIPAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}