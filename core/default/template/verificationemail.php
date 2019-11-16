<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/authentication/register.php");

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

$receivedToken = $token;
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