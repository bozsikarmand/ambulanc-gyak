<?php
session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/redirect.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/get.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/regenerate.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/authentication/role/constant.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/userprofile/utils/populate-select.php");

$loginEmail = $_SESSION['email'];

$listPublicPlaceTrait = populateSelect($databaseConnection); 

$profileImg = sessionGetUserImage($loginEmail, $databaseConnection);
$profileName = sessionGetName($loginEmail, $databaseConnection);

sessionRegenerateExistingMainKey($loginEmail, $databaseConnection);

$currentRole = getRoleInfo($loginEmail, $databaseConnection);

if ($currentRole == $USER) {
    header("Location:" . getURL() . "/core/default/frontend/nopermission.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Állomások hozzáadása</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-table.min.css">
    <link rel="stylesheet" href="/assets/css/gijgo.min.css">
    <script src="/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/js/gijgo.min.js"></script>
    <script src="/assets/js/bootstrap-input-spinner.js"></script>
    <script>
        $("input[type='number']").inputSpinner();
    </script>
    <link rel="stylesheet" href="/assets/css/mdb.min.css">
</head>
<body>
<div class="container-fullwidth">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/protected/dashboard/admin.php" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-tachometer-alt"></i> Vezérlőpult
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Felhasználók
                        <i class="fas fa-users"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="adminapproval.php" class="dropdown-item">
                            <i class="fas fa-user-check"></i> Elfogadásra váró felhasználók
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="users.php" class="dropdown-item">
                            <i class="fas fa-users"></i> Felhasználók
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="animal.php" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-dove"></i> Állatok
                    </a>
                </li>
                <li class="nav-item">
                    <a href="station.php" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-building"></i> Állomások
                    </a>
                </li>
                <li class="nav-item">
                    <a href="transport.php" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-shuttle-van"></i> Szállitások
                    </a>
                </li>
            </ul>
            <div class="navbar-nav ml-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-info">
                        <img src="<?php echo $profileImg; ?>" class="avatar img-responsive" alt="Profilkép">
                        <span class="header-username"><?php echo $profileName; ?></span>
                    </button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Menu lenyitása</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Valami</a>
                      <a class="dropdown-item" href="#">Még valami</a>
                      <a class="dropdown-item" href="#">Meg még valami</a>
                      <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/core/authentication/logout.php">
                            <i class="fas fa-sign-out-alt"></i> Kijelentkezés
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fullwidth" style="margin-top:100px">
        <form action="/core/action/add/station.php" method="post">
            <p>IRSZ:</p>
            <div class="form-label-group">
                <input id="inputZIPCode" name="inputZIPCode" type="number" value="1" min="1" max="9999" step="1" />
            </div>
            <p>Város:</p>
            <div class="form-label-group">
                <input id="inputCity" name="inputCity" type="text" />
            </div>
            <p>Közterület neve:</p>
            <div class="form-label-group">
                <input id="inputPublicPlaceName" name="inputPublicPlaceName" type="text" />
            </div>
            <p>Közterület jellege:</p>
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
            <p>Házszám:</p>
            <div class="form-label-group">
                <input id="inputHouseNumber" name="inputHouseNumber" type="number" value="1" min="1" max="999" step="1" />
            </div>
            <p>Épület betüjele:</p>
            <div class="form-label-group">
                <input id="inputBuildingLetter" name="inputBuildingLetter" type="text" />
            </div>
            <p>Szélességi koordináta:</p>   
            <div class="form-label-group">
                <input id="inputCoordW" name="inputCoordW" type="number" value="46.232941" data-decimals="6" min="-90" max="90" step="0.000001" />
            </div>
            <p>Hosszúsági koordináta:</p>   
            <div class="form-label-group">
                <input id="inputCoordH" name="inputCoordH" type="number" value="20.000386" data-decimals="6" min="-180" max="180" step="0.000001" />
            </div>
            <button class="btn btn-lg btn-secondary btn-block" name="button-add-station" type="submit">
                Hozzáadás
            </button>
        </form>
    </div>

    <footer class="page-footer font-small blue pt-4 bg-dark text-light">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase"></h5>
                    <p></p>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Linkek</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Link 1</a>
                        </li>
                        <li>
                            <a href="#">Link 2</a>
                        </li>
                        <li>
                            <a href="#">Link 3</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Linkek</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Link 1</a>
                        </li>
                        <li>
                            <a href="#">Link 2</a>
                        </li>
                        <li>
                            <a href="#">Link 3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-copyright text-center py-3">© 2019 Ambulánc
            <a href="#"></a>
        </div>
    </footer>
</div>
<script src="/assets/js/jquery-3.4.1.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/mdb.min.js"></script>
</body>
</html>




