<?php
session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/action/list/user.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/authentication/role/constant.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/get.php");

$loginEmail = $_SESSION['email'];

$currentRole = getRoleInfo($loginEmail, $databaseConnection);

if ($currentRole == $ADMIN) {
    header("Location:" . getURL() . "/core/default/frontend/nopermission.php");
} 

$recurringtrips = listRecurringTrips($databaseConnection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Főoldal</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="/assets/css/mdb.min.css">
    <link rel="stylesheet" href="/assets/css/addons/datatables.min.css">
</head>
<body>
<div class="container-fullwidth">
<<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/protected/dashboard/user.php" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-tachometer-alt"></i> Vezérlőpult
                    </a>
                </li>
                <li class="nav-item">
                    <a href="recurringtrips.php" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-shuttle-van"></i> Rendszeres utak
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
                        <th scope="col">#</th>
                        <th scope="col">Indulási város</th>
                        <th scope="col">Érkezési város</th>
                        <th scope="col">Indulási dátum</th>
                        <th scope="col">Érkezési dátum</th>
                        <th scope="col">Indulási idő</th>
                        <th scope="col">Érkezési idő</th>
                        <th scope="col">Heti rendszeresség</th>
                        <th scope="col">Hely</th>
                        <th scope="col">Művelet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recurringtrips as $row) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['ID']; ?></th>
                        <td><?php echo $row['IndVaros']; ?></td>
                        <td><?php echo $row['ErkVaros']; ?></td>
                        <td><?php echo $row['IndDatum']; ?></td>
                        <td><?php echo $row['ErkDatum']; ?></td>
                        <td><?php echo $row['IndIdo']; ?></td>
                        <td><?php echo $row['ErkIdo']; ?></td>
                        <td><?php echo $row['HetiRendszeresseg']; ?></td>
                        <td><?php echo $row['Hely']; ?></td>
                        <td>
                            <a href="/core/actions/modify/recurringtrips.php?id=<? echo $row['id'] ?>" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Módositás
                            </a>
                            <a href="/core/action/remove/recurringtrips.php?id=<? echo $row['id'] ?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Törlés
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
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
<script src="/assets/js/bootstrap-table.min.js"></script>
<script src="/assets/js/addons/datatables.min.js"></script>
<script>
$(document).ready(function () {
$('#datatable').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
</body>
</html>