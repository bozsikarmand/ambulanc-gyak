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
    $run->execute();
    $resultSet = $run -> fetchColumn();

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

function getCurrentSessionKey($userID, $databaseConnection)
{
    $queryCurrentSessionKey = "SELECT MunkamenetKulcs 
                               FROM munkamenet, szemelymunkamenet, szemely 
                               WHERE munkamenet.MunkamenetID = szemelymunkamenet.MunkamenetID 
                               AND szemely.ID = szemelymunkamenet.SzemelyID 
                               AND szemely.ID=:userid 
                               ORDER BY szemelymunkamenet.MunkamenetID DESC 
                               LIMIT 1";
                        
    $run = $databaseConnection -> prepare($queryCurrentSessionKey);
    $run->bindValue(':userid', $userID);
    $run->execute();
    $resultSet = $run -> fetchColumn();

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

function getCurrentSessionUsername($loginEmail, $databaseConnection)
{
    $queryUsername = "SELECT szemely.Felhasznalonev
                      FROM email, szemely 
                      WHERE szemely.ID = email.ID 
                      AND BelepesiEmail=:loginemail";
                        
    $run = $databaseConnection -> prepare($queryUsername);
    $run->bindValue(':loginemail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetchColumn();

    return $resultSet;
}

function getToken($loginEmail, $databaseConnection) {
    $queryToken = "SELECT szemely.HitelesitoKod
                   FROM email, szemely 
                   WHERE szemely.ID = email.ID 
                   AND BelepesiEmail=:loginemail";
                        
    $run = $databaseConnection -> prepare($queryToken);
    $run->bindValue(':loginemail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    return $resultSet;
}

function getRoleInfo($loginEmail, $databaseConnection)
{
    $queryRole = "SELECT szemelyjog.JogID
                  FROM email, szemely, szemelyjog, jog 
                  WHERE email.ID = szemely.ID
                  AND szemely.ID = szemelyjog.SzemelyID
                  AND szemelyjog.JogID = jog.ID
                  AND email.BelepesiEmail=:loginemail";
                        
    $run = $databaseConnection -> prepare($queryRole);
    $run->bindValue(':loginemail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetchColumn();

    return $resultSet;
}

function getUserImage($loginEmail, $databaseConnection) {
    $queryImage = "SELECT szemely.ProfilkepUtvonal
                  FROM email, szemely 
                  WHERE email.ID = szemely.ID
                  AND email.BelepesiEmail=:loginemail";
                        
    $run = $databaseConnection -> prepare($queryImage);
    $run->bindValue(':loginemail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetchAll();
    return $resultSet;
}

function getUserLoginTimeStamp($loginEmail, $databaseConnection)
{
    $queryTimeStamp = "SELECT munkamenet.MunkamenetKezdete
                       FROM munkamenet, szemelymunkamenet, szemely, email 
                       WHERE munkamenet.MunkamenetID = szemelymunkamenet.MunkamenetID 
                       AND szemelymunkamenet.SzemelyID = szemely.ID
                       AND email.ID = szemely.ID 
                       AND email.BelepesiEmail=:loginemail
                       ORDER BY munkamenet.MunkamenetKezdete DESC
                       LIMIT 1";

    $run = $databaseConnection -> prepare($queryTimeStamp);
    $run->bindValue(':loginemail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetchColumn();
    return $resultSet;
}