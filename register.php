<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/floating-labels.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <style>

    </style>
</head>
<body>
<form class="form-signin">
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Kérlek regisztrálj adataid megadásával!</h1>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-label-group">
                <input type="text" id="inputFirstname" name="inputFirstname" class="form-control" placeholder="Vezetéknév" required autofocus>
                <label for="inputFirstname">Vezetéknév</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputLastname" name="inputLastname" class="form-control" placeholder="Keresztnév" required>
                <label for="inputLastname">Keresztnév</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputMiddlename" name="inputMiddlename" class="form-control" placeholder="Utónév" required>
                <label for="inputMiddlename">Utónév</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputLandlineTel" name="inputLandlineTel" class="form-control" placeholder="Vezetékes telefon" required>
                <label for="inputLandlineTel">Vezetékes telefon</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputMobileTel" name="inputMobileTel" class="form-control" placeholder="Mobil telefon" required>
                <label for="inputMiddlename">Mobil telefon</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Felhasználónév" required>
                <label for="inputUsername">Felhasználónév</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Jelszó" required>
                <label for="inputPassword">Jelszó</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPasswordConfirmation" name="inputPasswordConfirmation" class="form-control" placeholder="Jelszó ellenörzése" required>
                <label for="inputPasswordConfirmation">Jelszó ellenörzése</label>
            </div>

            <div class="form-label-group">
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email cím" required>
                <label for="inputEmail">Email cím</label>
            </div>
        </div>
        <div class="col">
            <div class="form-label-group">
                <input type="text" id="inputPublicPlaceName" name="inputPublicPlaceName" class="form-control"
                       placeholder="A közterület neve ahol laksz:" required>
                <label for="inputPublicPlaceName">A közterület neve ahol laksz</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputPublicPlaceTrait" name="inputPublicPlaceTrait" class="form-control" placeholder="A közterület jellege:"
                       required>
                <label for="inputPublicPlaceTrait">A közterület jellege</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputHouseNumber" name="inputHouseNumber" class="form-control" placeholder="Házszám" required>
                <label for="inputHouseNumber">Házszám</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputBuildingMarker" name="inputBuildingMarker" class="form-control" placeholder="Épület:">
                <label for="inputBuildingMarker">Épület</label>
            </div>

            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheckBoxTOS" name="agree-tos">
                <label class="custom-control-label" for="customCheckBoxTOS"> Elfogadom a <a href="#">felhasználási
                    feltételeket</a></label>
            </div>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheckBoxPP" name="agree-pp">
                <label class="custom-control-label" for="customCheckBoxPP"> Elfogadom az <a href="#">adatvédelmi nyilatkozatot</a></label>
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="button-sign-up" type="submit">
            <i class="fas fa-users"></i> Regisztráció
        </button>
        <button class="btn btn-lg btn-secondary btn-block" name="button-sign-in" type="submit">
            <i class="fas fa-sign-in-alt"></i> Már rendelkezem felhasználói fiókkal
        </button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 Ambulánc</p>
    </div>
</form>

<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/select2.min.js"></script>
</body>
</html>