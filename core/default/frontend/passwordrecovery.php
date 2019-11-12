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
    <form class="form-signin" action="../../../../core/authentication/password/reset.php" method="post">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Kérlek add meg adataid a jelszó visszaallitasahoz!</h1>
        </div>

        <div class="form-label-group">
            <input type="text" name="inputLoginEmail" id="inputLoginEmail" class="form-control" placeholder="Belépési email cim" required autofocus>
            <label for="inputLoginEmail">Belépési email cim</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" name="button-password-recovery" type="submit">
            <i class="fas fa-key"></i> Új jelszó kuldese
        </button>
        <div>
            <a href="index.php" role="button" class="btn btn-secondary btn-block">
                <i class="fas fa-home"></i> Visszatérés a főoldalra
            </a>
        </div>

        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 Ambulánc</p>
    </form>

    <script src="../../../../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../../../../assets/js/popper.min.js"></script>
    <script src="../../../../assets/js/bootstrap.min.js"></script>
</body>
</html>