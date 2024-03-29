<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/floating-labels.css">
    <link rel="stylesheet" href="assets/css/mdb.min.css">
</head>
<body>
    <form class="form-signin" action="core/authentication/login.php" method="post">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Kérlek jelentkezz be!</h1>
        </div>

        <div class="form-label-group">
            <input type="text" name="inputLoginEmail" id="inputLoginEmail" class="form-control" placeholder="Belépési email cim" required autofocus>
            <label for="inputLoginEmail">Belépési email cim</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Jelszó" required>
            <label for="inputPassword">Jelszó</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" name="button-login" type="submit">
            <i class="fas fa-sign-in-alt"></i> Bejelentkezés
        </button>
        <div>
            <button class="btn btn-lg btn-secondary btn-block" type="submit" form="register">
                <i class="fas fa-users"></i> Segítő leszek!
            </button>
        </div>
        <div>
            <a href="core/default/frontend/passwordrecovery.php">
                <i class="fas fa-key"></i> Elfelejtetted jelszavad?
            </a>
        </div>

        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 Ambulánc</p>
    </form>
    <form id="register" action="register.php" method="post"></form>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/mdb.min.js"></script>
</body>
</html>