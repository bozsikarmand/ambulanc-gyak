<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Adataid megtekintése</title>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../../assets/css/floating-labels.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../../assets/css/fileinput.min.css">
    <link rel="stylesheet" href="../../../assets/css/profiledata.css">
    <script src="../../../assets/js/populate-select.js" defer></script>
</head>
<body>
<?php
    include_once ("../../../core/userprofile/list/profiledata.php");
?>
<form class="form-signin" action="../../../core/userprofile/modify/profiledata.php" method="post">
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Itt megtekintheted adataid!</h1>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputLoginEmail" name="inputLoginEmail" class="form-control" placeholder="Belépési email cim" required>
        <label for="inputLoginEmail">Belépési email cim</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Felhasználónév" required>
        <label for="inputUsername">Felhasználónév</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputLastName" name="inputLastName" class="form-control" placeholder="Vezetéknév" required>
        <label for="inputLastName">Vezetéknév</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputFirstName" name="inputFirstName" class="form-control" placeholder="Keresztnév" required>
        <label for="inputFirstName">Keresztnév</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputMiddleName" name="inputMiddleName" class="form-control" placeholder="Utónév" required>
        <label for="inputMiddleName">Utónév</label>
    </div>

    <div class="form-label-group">
        <input type="tel" id="inputLandlineTel" name="inputLandlineTel" class="form-control" placeholder="Vezetékes telefonszám" required>
        <label for="inputLandlineTel">Vezetékes telefonszám</label>
    </div>

    <div class="form-label-group">
        <input type="tel" id="inputMobileTel" name="inputMobileTel" class="form-control" placeholder="Mobil telefonszám" required>
        <label for="inputMobileTel">Mobil telefonszám</label>
    </div>

    <div class="form-label-group">
        <input type="number" id="inputZIPCode" name="inputZIPCode" class="form-control" placeholder="Irányitószám" required>
        <label for="inputZIPCode">Irányitószám</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputCity" name="inputCity" class="form-control" placeholder="Város" required>
        <label for="inputCity">Város</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputPublicPlaceName" name="inputPublicPlaceName" class="form-control" placeholder="Közterület neve" required>
        <label for="inputPublicPlaceName">Közterület neve</label>
    </div>

    <div class="form-label-group">
        <select class="form-control selectpicker" data-live-search="true" id="inputPublicPlaceTrait" name="inputPublicPlaceTrait" title="Közterület jellege" data-width="100%" required>
        </select>
    </div>

    <div class="form-label-group">
        <input type="number" id="inputHouseNumber" name="inputHouseNumber" class="form-control" placeholder="Házszám" required>
        <label for="inputHouseNumber">Házszám</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputBuildingLetter" name="inputBuildingLetter" class="form-control" placeholder="Épület betűjele" required>
        <label for="inputBuildingLetter">Épület betűjele</label>
    </div>

    <button class="btn btn-lg btn-secondary btn-block" name="button-add-user-info" type="submit">
        <i class="fas fa-times-circle"></i> Mégsem
    </button>
    <button class="btn btn-lg btn-primary btn-block" name="button-add-user-info" type="submit">
        <i class="fas fa-check-circle"></i> Mentés
    </button>
    <div>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 Ambulánc</p>
    </div>
</form>

<div id="kv-avatar-errors" class="center-block" style="width:800px;display:none"></div>

<script src="../../../assets/js/jquery-3.4.1.min.js"></script>
<script src="../../../assets/js/popper.min.js"></script>
<script src="../../../assets/js/bootstrap.min.js"></script>
<script src="../../../assets/js/populate-select.js"></script>
<script src="../../../assets/js/bootstrap-select.min.js"></script>
<script src="../../../assets/js/defaults-hu_HU.min.js"></script>
<script src="../../../assets/js/piexif.min.js"></script>
<script src="../../../assets/js/purify.min.js"></script>
<script src="../../../assets/js/fileinput.min.js"></script>
<script src="../../../assets/js/theme.min.js"></script>
<script src="../../../assets/js/hu.js"></script>
</body>
</html>