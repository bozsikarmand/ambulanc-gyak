<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/floating-labels.css">
    <style>

    </style>
</head>
<body>
<form class="form-signin" action="core/authentication/register.php" method="post">
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Kérlek regisztrálj adataid megadásával!</h1>
    </div>
    
    <div class="form-label-group">
        <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Felhasználónév" required>
        <label for="inputUsername">Felhasználónév</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputLoginEmail" name="inputLoginEmail" class="form-control" placeholder="Belépési email cim" required>
        <label for="inputLoginEmail">Belépési email cim</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Jelszó" required>
        <label for="inputPassword">Jelszó</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPasswordConfirmation" name="inputPasswordConfirmation" class="form-control" placeholder="Jelszó ellenörzése" required>
        <label for="inputPasswordConfirmation">Jelszó ellenörzése</label>
   </div>

    <div class="custom-control custom-checkbox mb-3">
        <input type="checkbox" class="custom-control-input" id="customCheckBoxTOS" name="agree-tos" value="Yes" required="required">
        <label class="custom-control-label" for="customCheckBoxTOS"> Elfogadom a <a href="#">felhasználási feltételeket</a></label>
    </div>
    <div class="custom-control custom-checkbox mb-3">
        <input type="checkbox" class="custom-control-input" id="customCheckBoxPP" name="agree-pp" value="Yes" required="required">
        <label class="custom-control-label" for="customCheckBoxPP"> Elfogadom az <a href="#">adatvédelmi nyilatkozatot</a></label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" name="button-sign-up" type="submit">
        <i class="fas fa-users"></i> Regisztráció
    </button>
    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
    <div>
        <button class="btn btn-lg btn-secondary btn-block" name="button-sign-in" type="submit" form="inner">
            <i class="fas fa-sign-in-alt"></i> Már rendelkezem felhasználói fiókkal
        </button>
    </div>
    <form id="inner" action="login.php" method="post"></form>
    
    <div>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 Ambulánc</p>
    </div>
</form>

<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LedcL0UAAAAALEf_JiZAN5yy1XjPDEiIWAXmZRH"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LedcL0UAAAAALEf_JiZAN5yy1XjPDEiIWAXmZRH', { action: 'register' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
</body>
</html>