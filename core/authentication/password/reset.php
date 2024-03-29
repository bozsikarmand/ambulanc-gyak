<?php

ob_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/mail/sender.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/getURL.php");

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

if (isset($_POST['button-password-recovery'])) {
  $token = bin2hex(openssl_random_pseudo_bytes(50));
  $loginEmail = $_POST['inputLoginEmail'];
  
  $updateToken = "UPDATE szemely p
                  JOIN email e ON e.ID = p.ID
                  SET p.HitelesitoKod=:updatetoken
                  WHERE e.BelepesiEmail=:loginemail";
                  
  $run = $databaseConnection -> prepare($updateToken);
  $run->bindValue(':updatetoken', $token);
  $run->bindValue(':loginemail', $loginEmail);
  $run->execute();

  $subject = "Elfelejtett jelszo visszaallitasa";
  $body = '<!DOCTYPE html>
      <html lang="hu">

      <head>
        <meta charset="UTF-8">
        <title>Elfelejtett jelszó visszaállitása</title>
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
          <p>Jelszavad visszaállitását kezdeményezted az Ambulánc oldalon! A visszaállitáshoz kérlek kattints az alábbi linkre:</p>
          <a href="' . getURL() . '/core/default/frontend/setpassword.php?token=' . $token . '">Jelszó visszaállitása!</a>
        </div>
      </body>
      </html>';
      
      $sentMail = sendEmail($loginEmail, $subject, $body);
      
      if ($sentMail) {
        header("Location:" . getURL() . "/core/default/frontend/passwordreset.php");
      } else {
        echo "Az email küldése során hiba lépett fel!";
      }
}
ob_end_clean();