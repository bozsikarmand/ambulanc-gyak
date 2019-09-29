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
                <input type="text" id="inputFirstname" class="form-control" placeholder="Vezetéknév" required autofocus>
                <label for="inputFirstname">Vezetéknév</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputLastname" class="form-control" placeholder="Keresztnév" required>
                <label for="inputLastname">Keresztnév</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputMiddlename" class="form-control" placeholder="Utónév" required>
                <label for="inputMiddlename">Utónév</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputLandlineTel" class="form-control" placeholder="Vezetékes telefon" required>
                <label for="inputLandlineTel">Vezetékes telefon</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputMobileTel" class="form-control" placeholder="Mobil telefon" required>
                <label for="inputMiddlename">Mobil telefon</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputUsername" class="form-control" placeholder="Felhasználónév" required>
                <label for="inputUsername">Felhasználónév</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Jelszó" required>
                <label for="inputPassword">Jelszó</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPasswordConfirmation" class="form-control" placeholder="Jelszó ellenörzése" required>
                <label for="inputPasswordConfirmation">Jelszó ellenörzése</label>
            </div>

            <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email cím" required>
                <label for="inputEmail">Email cím</label>
            </div>
        </div>
        <div class="col">
            <div class="form-label-group">
                <input type="text" id="inputPublicPlaceName" class="form-control"
                       placeholder="A közterület neve ahol laksz:" required>
                <label for="inputPublicPlaceName">A közterület neve ahol laksz</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputPublicPlaceTrait" class="form-control" placeholder="A közterület jellege:"
                       required>
                <label for="inputPublicPlaceTrait">A közterület jellege</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputHouseNumber" class="form-control" placeholder="Házszám" required>
                <label for="inputHouseNumber">Házszám:</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="inputBuildingMarker" class="form-control" placeholder="Épület:">
                <label for="inputBuildingMarker">Épület</label>
            </div>

            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheckBoxTOS" name="aggree-tos">
                <label class="custom-control-label" for="customCheckBoxTOS"> Elfogadom a <a href="#">felhasználási
                    feltételeket</a></label>
            </div>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheckBoxPP" name="aggree-pp">
                <label class="custom-control-label" for="customCheckBoxPP"> Elfogadom az <a href="#">adatvédelmi nyiltakozatot</a></label>
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            <i class="fas fa-users"></i> Regisztráció
        </button>
        <button class="btn btn-lg btn-secondary btn-block" type="submit">
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