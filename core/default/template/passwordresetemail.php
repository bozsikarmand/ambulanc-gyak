$body = '<!DOCTYPE html>
      <html lang="hu">

      <head>
        <meta charset="UTF-8">
        <title>Elfelejtett jelszo visszaallitasa</title>
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
          <p>Jelszavad visszaallitasat kezdemenyezted az Ambulanc oldalon! A visszaallitashoz kerlek kattints az alabbi linkre:</p>
          <a href="https://ambulanc.bozsikarmand.hu/core/default/frontend/setpassword.php?token=' . $token . '">Jelszo visszaallitasa!</a>
        </div>
      </body>
      </html>';