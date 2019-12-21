<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/authentication/role/constant.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/get.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/action/list/single/animal.php");

$loginEmail = $_SESSION['email'];

$getID = $_GET['id'];

$currentRole = getRoleInfo($loginEmail, $databaseConnection);
$animal = listSingleAnimal($databaseConnection, $getid);

if ($currentRole == $USER) {
    header("Location:" . getURL() . "/core/default/frontend/nopermission.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Állatok módositása</title>
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
                        <img src="https://via.placeholder.com/20" class="avatar img-responsive" alt="Profilkép">
                        <span class="header-username"><?php echo $_SESSION["fullname"] ?> </span>
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

        <div class="table-responsive">
            <table class="table" data-toggle="table" id="datatable">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="2">Felhasználó adatai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($viewProfileDataForAdmin as $row) { ?>
                    <tr>
                        <td>Fajta:</td>
                        <td>
                            <input id="inputSpecies" value="<? echo $row['Faj']; ?>" name="inputSpecies" type="text" />
                        </td>
                    </tr>
                    <tr>
                        <td>Hordozó szélessége:</td>
                        <td>                    
                            <input id="inputCarrierW" name="inputCarrierW" type="number" value="<?php echo $row['HordozoSz']; ?>" min="1" max="200" step="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>Hordozó magassága:</td>
                        <td>
                            <input id="inputCarrierH" name="inputCarrierH" type="number" value="<?php echo $row['HordozoM']; ?>" min="1" max="200" step="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>Hordozó hosszúsága:</td>
                        <td>
                            <input id="inputCarrierD" name="inputCarrierD" type="number" value="<?php echo $row['HordozoH']; ?>" min="1" max="200" step="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>Veszélyes:</td>
                        <td>
                            <input id="inputDangerous" name="inputDangerous" type="checkbox" value="<?php echo $row['Veszelyes']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Súlyos:</td>
                        <td>
                            <input id="inputSerious" name="inputSerious" type="checkbox" value="<?php echo $row['Sulyos']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Egyedek száma:</td>
                        <td>
                            <input id="inputNumOfIndividuals" name="inputNumOfIndividuals" type="number" value="<?php echo $row['EgyedSzam']; ?>" min="1" max="10" step="1"/>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <form name="updateAnimal" action="#" method="post">
            <p>Fajta:</p>
            <div class="form-label-group">
                <input id="inputSpecies" value="<? echo $row['Faj']; ?>" name="inputSpecies" type="text" />
            </div>
            <p>Hordozó szélessége:</p>
            <div class="form-label-group">
                <input id="inputCarrierW" name="inputCarrierW" type="number" value="<?php echo $row['HordozoSz']; ?>" min="1" max="200" step="1" />
            </div>
            <p>Hordozó magassága:</p>
            <div class="form-label-group">
                <input id="inputCarrierH" name="inputCarrierH" type="number" value="<?php echo $row['HordozoM']; ?>" min="1" max="200" step="1" />
            </div>
            <p>Hordozó hosszúsága:</p>
            <div class="form-label-group">
                <input id="inputCarrierD" name="inputCarrierD" type="number" value="<?php echo $row['HordozoH']; ?>" min="1" max="200" step="1" />
            </div>
            <p>Veszélyes:</p>
            <div class="form-label-group">
                <input id="inputDangerous" name="inputDangerous" type="checkbox" value="<?php echo $row['Veszelyes']; ?>" />
            </div>
            <p>Súlyos:</p>
            <div class="form-label-group">
                <input id="inputSerious" name="inputSerious" type="checkbox" value="<?php echo $row['Sulyos']; ?>" />
            </div>
            <p>Egyedek száma:</p>   
            <div class="form-label-group">
                <input id="inputNumOfIndividuals" name="inputNumOfIndividuals" type="number" value="<?php echo $row['EgyedSzam']; ?>" min="1" max="10" step="1"/>
            </div>
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