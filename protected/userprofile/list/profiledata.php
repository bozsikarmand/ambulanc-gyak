<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/userprofile/utils/populate-select.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/userprofile/list/profiledata.php");

$listProfileData = listProfileData($sessionKey, $databaseConnection);
$listPublicPlaceTrait = populateSelect($databaseConnection); 

?>

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
</head>
<body>
<form class="form-signin" action="../../../core/userprofile/modify/profiledata.php" method="post">
    <?php 

    $lemail = $listProfileData['BelepesiEmail'];
    $pemail = $listProfileData['PublikusEmail'];
    $username = $listProfileData['Felhasznalonev'];
    $lastname = $listProfileData['Vezeteknev'];
    $firstname = $listProfileData['Keresztnev'];
    $middlename = $listProfileData['Utonev'];
    $landlinetel = $listProfileData['VezetekesTel'];
    $mobiletel = $listProfileData['MobilTel'];
    $zipcode = $listProfileData['IRSZ'];
    $city = $listProfileData['Varos'];
    $publicplacename = $listProfileData['KozteruletNeve'];
    $housenumber = $listProfileData['Hazszam'];    
    $building = $listProfileData['Epulet'];
    $lastlogin = $listProfileData['UtolsoBelepesIdopontja'];

    ?>
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Itt megtekintheted adataid!</h1>
    </div>

    <div class="form-label-group">
        <input type="text" value="<?php echo $lemail; ?>" id="inputLoginEmail" name="inputLoginEmail" class="form-control" placeholder="Belépési email cim" required>
        <label for="inputLoginEmail">Belépési email cim</label>
    </div>

    <div class="form-label-group">
        <input type="text" value="<?php echo $pemail; ?>" id="inputPublicEmail" name="inputPublicEmail" class="form-control" placeholder="Publikus email cim" required>
        <label for="inputPublicEmail">Publikus email cim</label>
    </div>

    <div class="form-label-group">
        <input type="text" value="<?php echo $username; ?>" id="inputUsername" name="inputUsername" class="form-control" placeholder="Felhasználónév" required>
        <label for="inputUsername">Felhasználónév</label>
    </div>

    <div class="form-label-group">
        <input value="<?php echo $lastname; ?>" type="text" id="inputLastName" name="inputLastName" class="form-control" placeholder="Vezetéknév" required>
        <label for="inputLastName">Vezetéknév</label>
    </div>

    <div class="form-label-group">
        <input value="<?php echo $firstname; ?>" type="text" id="inputFirstName" name="inputFirstName" class="form-control" placeholder="Keresztnév" required>
        <label for="inputFirstName">Keresztnév</label>
    </div>

    <div class="form-label-group">
        <input value="<?php echo $middlename; ?>" type="text" id="inputMiddleName" name="inputMiddleName" class="form-control" placeholder="Utónév" required>
        <label for="inputMiddleName">Utónév</label>
    </div>

    <div class="form-label-group">
        <input value="<?php echo $landlinetel; ?>" type="tel" id="inputLandlineTel" name="inputLandlineTel" class="form-control" placeholder="Vezetékes telefonszám" required>
        <label for="inputLandlineTel">Vezetékes telefonszám</label>
    </div>

    <div class="form-label-group">
        <input value="<?php echo $mobiletel; ?>" type="tel" id="inputMobileTel" name="inputMobileTel" class="form-control" placeholder="Mobil telefonszám" required>
        <label for="inputMobileTel">Mobil telefonszám</label>
    </div>

    <div class="form-label-group">
        <input value="<?php echo $zipcode; ?>" type="number" id="inputZIPCode" name="inputZIPCode" class="form-control" placeholder="Irányitószám" required>
        <label for="inputZIPCode">Irányitószám</label>
    </div>

    <div class="form-label-group">
        <input value="<?php echo $city; ?>" type="text" id="inputCity" name="inputCity" class="form-control" placeholder="Város" required>
        <label for="inputCity">Város</label>
    </div>

    <div class="form-label-group">
        <input value="<?php echo $publicplacename; ?>" type="text" id="inputPublicPlaceName" name="inputPublicPlaceName" class="form-control" placeholder="Közterület neve" required>
        <label for="inputPublicPlaceName">Közterület neve</label>
    </div>

    <div class="form-label-group">
        <select class="form-control selectpicker" data-live-search="true" id="inputPublicPlaceTrait" name="inputPublicPlaceTrait" title="Közterület jellege" data-width="100%" required>
        
        <?php

                foreach ($listPublicPlaceTrait as $trait) { ?>

                    <option data-tokens="<?php 
                                            echo $trait['trait']; 
                                         ?>">
                                            <?php 
                                                echo $trait['trait'];
                                            ?>
                    </option>

        <?php } ?>
        
        </select>
    </div>

    <div class="form-label-group">
        <input value="<?php echo $housenumber; ?>" type="number" id="inputHouseNumber" name="inputHouseNumber" class="form-control" placeholder="Házszám" required>
        <label for="inputHouseNumber">Házszám</label>
    </div>

    <div class="form-label-group">
        <input value="<?php echo $building; ?>" type="text" id="inputBuildingLetter" name="inputBuildingLetter" class="form-control" placeholder="Épület betűjele" required>
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
<script src="../../../assets/js/bootstrap-select.min.js"></script>
<script src="../../../assets/js/defaults-hu_HU.min.js"></script>
<script src="../../../assets/js/piexif.min.js"></script>
<script src="../../../assets/js/purify.min.js"></script>
<script src="../../../assets/js/fileinput.min.js"></script>
<script src="../../../assets/js/theme.min.js"></script>
<script src="../../../assets/js/hu.js"></script>
</body>
</html>