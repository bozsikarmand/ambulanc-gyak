<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Elfelejtett jelszo visszaallitasa</title>
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../../../assets/css/floating-labels.css">
    <style>

    </style>
</head>
<body>
    <form class="form-signin" action="core/authentication/login.php" method="post">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Kérlek add meg adataid a jelszó visszaallitasahoz!</h1>
        </div>

        <div class="form-label-group">
            <input type="text" name="inputLoginEmail" id="inputLoginEmail" class="form-control" placeholder="Belépési email cim vagy felhasznalonev" required autofocus>
            <label for="inputLoginEmailOrUsername">Belépési email cim vagy felhasznalonev</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" name="button-login" type="submit">
            <i class="fas fa-key"></i> Új jelszó kuldese
        </button>
        <div>
            <a href="index.php" role="button" class="btn btn-primary">
                <i class="fas fa-home"></i> Visszatérés a főoldalra
            </a>
        </div>

        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 Ambulánc</p>
    </form>
    <form id="register" action="register.php" method="post"></form>

    <script src="../../../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../../../assets/js/popper.min.js"></script>
    <script src="../../../../assets/js/bootstrap.min.js"></script>
</body>
</html>