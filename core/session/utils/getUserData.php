<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

function getUserID($loginEmail, $databaseConnection) {
    $queryID = "SELECT szemely.ID
                FROM szemely 
                JOIN email
                ON szemely.ID = email.ID
                WHERE email.BelepesiEmail=:loginEmail";
    
    $run = $databaseConnection->prepare($queryID);
        
    $run->bindValue(':loginEmail', $loginEmail);
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet;
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

function getCurrentSession($loginEmail, $databaseConnection)
{
    $queryCurrentSession = "SELECT MunkamenetID 
                            FROM szemelymunkamenet 
                            WHERE SzemelyID=:userid 
                            ORDER BY MunkamenetID DESC 
                            LIMIT 1";
                        
    $run = $databaseConnection -> prepare($queryName);
    $run->bindValue(':loginemail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet;
}

function getName($loginEmail, $databaseConnection)
{
    $queryName = "SELECT email.BelepesiEmail as le, 
                  CONCAT(szemely.Vezeteknev, 
                      SPACE(1), 
                      szemely.Keresztnev, 
                      SPACE(1), 
                      szemely.Utonev) as fullname 
                  FROM email, szemely 
                  WHERE szemely.ID = email.ID 
                  AND BelepesiEmail=:loginemail";
                        
    $run = $databaseConnection -> prepare($queryName);
    $run->bindValue(':loginemail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet;
}

function getInfo($sessionID, $databaseConnection)
{
    $queryInfo = "SELECT szemely.Felhasznalonev, szemely.Vezeteknev, szemely.Keresztnev, szemely.Utonev, 
                         szemely.VezetekesTel, szemely.MobilTel, szemely.IRSZ, szemely.Varos, 
                         szemely.KozteruletNeve, szemely.KozteruletJellege, szemely.Hazszam, 
                         szemely.Epulet, szemely.Statusz, email.BelepesiEmail, email.PublikusEmail  
                  FROM email, szemely 
                  WHERE szemely.ID = email.ID 
                  AND BelepesiEmail=:loginemail";
                        
    $run = $databaseConnection -> prepare($queryName);
    $run->bindValue(':loginemail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet;
}