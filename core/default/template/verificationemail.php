<?php

require_once ("../../database/config.php");

function getToken($username, $loginEmail) {
    // Email megerositese
    $queryToken = "SELECT HitelesitoKod as vt 
                   FROM szemely, email
                   WHERE HitelesitoKod=:querytoken
                   AND Felhasznalonev=:username
                   AND BelepesiEmail=:loginEmail";
    
    $run = $databaseConnection -> prepare($queryToken);
    $run->bindValue(':querytoken', $token);
    $run->bindValue(':username', $username);
    $run->bindValue(':loginEmail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    // Eroforras felszabaditasa
    unset($run);
    
    return $resultSet['vt'];
}


$receivedToken = getToken($username, $loginEmail);
$subject = 'Regisztráció megerősitése';
$body = '<!DOCTYPE html>
      <html lang="hu">

      <head>
        <meta charset="UTF-8">
        <title>Regisztráció megerősitése</title>
        <style>
          .wrapper {
            padding: 10px;
            color: #000;
            font-size: 1.4em;
          }
          a {
            background: #dd3333;
            text-decoration: none;
            padding: 8px 10px;
            color: #fff;
          }
        </style>
      </head>

      <body>
        <div class="wrapper">
          <p>Koszonjuk hogy regisztraltal oldalunkon! Email cimed megerositesehez kattints erre a linkre:</p>
          <a href="https://ambulanc.bozsikarmand.hu/core/mail/verifyemail.php?token=' . $receivedToken . '">Email cim megerositese!</a>
        </div>
      </body>
      </html>';