<?php

session_start();

$token = $_GET['token'];
$_SESSION['sessToken'] = $token;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Új jelszó beállitása</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/floating-labels.css">
    <link rel="stylesheet" href="/assets/css/mdb.min.css">
</head>
<body>
    <form class="form-signin" action="/core/authentication/password/set.php" method="post">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Kérlek add meg uj jelszavadat!</h1>
        </div>

        <div class="form-label-group">
            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Uj jelszo" required autofocus>
            <label for="inputPassword">Új jelszó</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="inputPasswordConfirmation" id="inputPasswordConfirmation" class="form-control" placeholder="Uj jelszo ellenorzese" required autofocus>
            <label for="inputPasswordConfirmation">Új jelszó mégegyszer</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" name="button-password-set" type="submit">
            <i class="fas fa-key"></i> Új jelszó beállitása
        </button>
        
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 Ambulánc</p>
    </form>

    <script src="/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/mdb.min.js"></script>
</body>
</html>