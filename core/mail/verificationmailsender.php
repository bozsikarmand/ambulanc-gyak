<?php

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ("../../vendor/autoload.php");

$EMAIL_HOST = 'ambulanc.bozsikarmand.hu';
$EMAIL_USER = 'ambulanc@ambulanc.bozsikarmand.hu';
$EMAIL_PASS = 'bozsikaambulanc';
$EMAIL_PORT = '465';
$EMAILTO = 'ambulanc@ambulanc.bozsikarmand.hu';
$EMAILFROM = 'ambulanc@ambulanc.bozsikarmand.hu';
$EMAIL_ADDRESS = 'ambulanc@ambulanc.bozsikarmand.hu';

$swift = (new Swift_SmtpTransport($EMAIL_HOST, 465, 'ssl'))
    ->setUsername($EMAIL_USER)
    ->setPassword($EMAIL_PASS);

$mail = new Swift_Mailer($swift);

function sendVerificationEmail($loginEmail, $token)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="hu">

    <head>
      <meta charset="UTF-8">
      <title>Regisztráció megerősitése</title>
      <style>
        .wrapper {
          padding: 10px;
          color: #ddd;
          font-size: 1.1em;
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
        <a href="https://ambulanc.bozsikarmand.hu/core/mail/verifyemail.php?token=' . $token . '">Email cim megerositese!</a>
      </div>
    </body>

    </html>';

    $message = (new Swift_Message('Email cim megerositese!'))
        ->setFrom('ambulanc@ambulanc.bozsikarmand.hu')
        ->setTo($loginEmail)
        ->setBody($body, 'text/html');

    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}