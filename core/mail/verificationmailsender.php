<?php

require_once ("../../vendor/autoload.php");
require_once ("config.php");

$swift = (new Swift_SmtpTransport($EMAIL_HOST, $EMAIL_PORT, 'ssl'))
    ->setUsername($EMAIL_USER)
    ->setPassword($EMAIL_PASS);

$mail = new Swift_Mailer($swift);

function sendVerificationEmail($email, $token)
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
        ->setFrom($EMAIL_FROM)
        ->setTo($EMAIL_TO)
        ->setBody($body, 'text/html');

    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}