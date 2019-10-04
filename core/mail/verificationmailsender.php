<?php

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

function sendVerificationEmail($loginEmail, $token)
{
  $EMAIL_HOST = "ambulanc.bozsikarmand.hu";
  $EMAIL_USER = "ambulanc@ambulanc.bozsikarmand.hu";
  $EMAIL_PASS = "bozsikaambulanc";
  $EMAIL_PORT = "465";
  $EMAIL_TO = $loginEmail;
  $EMAIL_FROM = "ambulanc@ambulanc.bozsikarmand.hu";
  $EMAIL_FROM_NAME = "Ambulánc";
  $EMAIL_REPLY_TO = "ambulanc@ambulanc.bozsikarmand.hu";
  $EMAIL_REPLY_TO_NAME = "Ambulánc";

  $mail = new PHPMailer(true);

  try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;        
    $mail->isSMTP();
    $mail->Host = $EMAIL_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = $EMAIL_USER;
    $mail->Password = $EMAIL_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                           
    $mail->Port = 465;

    $mail->setFrom($EMAIL_FROM, $EMAIL_FROM_NAME);
    $mail->addAddress($EMAIL_TO);
    $mail->addReplyTo($EMAIL_REPLY_TO, $EMAIL_REPLY_TO_NAME);
    
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->Subject = 'Regisztráció megerősitése';

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
          <a href="https://ambulanc.bozsikarmand.hu/core/mail/verifyemail.php?token=' . $token . '">Email cim megerositese!</a>
        </div>
      </body>
      </html>';

      $mail->Body = $body;

      $result = ($mail->Send());

      if ($result) {
          return true;
      } else {
          return false;
      }
    } catch (Exception $ex) {
      $ex = "A level nem kuldheto el! Hiba: {$mail->ErrorInfo}";
    }
}