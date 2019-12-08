<?php
session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/action/list/user.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$path = addRecurringTrips($databaseConnection, $startCity, $endCity, $startDate, $endDate, $startTime, $endTime, $weeklyRecurrence, $availableSpace);
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
    <link rel="stylesheet" href="/assets/css/bootstrap-table.min.css">

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
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-tachometer-alt"></i> Vezérlőpult
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-chart-pie"></i> Statisztikák
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Felhasználók
                        <i class="fas fa-users"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="/core/protected/dashboard/functions/admin/adminapproval.php" class="dropdown-item">
                            <i class="fas fa-user-check"></i> Elfogadásra váró felhasználók
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="list/users.php" class="dropdown-item">
                            <i class="fas fa-users"></i> Felhasználók
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-dove"></i> Állatok
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-building"></i> Állomások
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
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
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-sign-out-alt"></i> Kijelentkezés
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fullwidth" style="margin-top:100px">
    <div class="form-label-group">
        <select class="form-control selectpicker" data-live-search="true" id="inputStartCity" name="inputStartCity" title="Indulo varos" data-width="100%" required>
            <?php
                foreach ($listStartCity as $scity) { ?>
                    <option data-tokens="<?php echo $scity['IndVaros']; ?>">
                        <?php echo $trait['IndVaros']; ?>
                    </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-label-group">
        <select class="form-control selectpicker" data-live-search="true" id="inputEndCity" name="inputEndCity" title="Erkezesi varos" data-width="100%" required>
            <?php
                foreach ($listEndCity as $ecity) { ?>
                    <option data-tokens="<?php echo $ecity['ErkVaros']; ?>">
                        <?php echo $ecity['ErkVaros']; ?>
                    </option>
            <?php } ?>
        </select>
    </div>

    <table class="table" data-toggle="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Név</th>
                <th scope="col">Muvelet</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $row) { ?>
            <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row['fullname']; ?></td>
                <td>
                    <a href="/core/actions/modify/user.php?id=<? echo $row['id'] ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Módositás
                    </a>
                    <a href="/core/action/remove/user.php?id=<? echo $row['id'] ?>" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Törlés
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
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
</body>
</html>



