<?php
session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/redirect.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/get.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/regenerate.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/authentication/role/constant.php");

$loginEmail = $_SESSION['email'];
$profileImg = sessionGetUserImage($loginEmail, $databaseConnection);
$profileName = sessionGetName($loginEmail, $databaseConnection);

sessionRegenerateExistingMainKey($loginEmail, $databaseConnection);

$currentRole = getRoleInfo($loginEmail, $databaseConnection);

if ($currentRole == $ADMIN) {
    header("Location:" . getURL() . "/core/default/frontend/nopermission.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Rendszeres utak hozzaadása</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-table.min.css">
    <link rel="stylesheet" href="/assets/css/tempusdominus-bootstrap-4.min.css">
    <script src="/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/assets/js/moment-with-locales.min.js"></script>
    <script src="/assets/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/assets/js/bootstrap-input-spinner.js"></script>
    <script>
        $("input[type='number']").inputSpinner();
    </script>
    <script>
    $(function () {
        $('#datepickerStartDate').datetimepicker({
            format: 'Y-MM-DD'
        });
        $('#datepickerEndDate').datetimepicker({
            format: 'Y-MM-DD'
        });
        $('#timepickerStartTime').datetimepicker({
            format: 'HH:mm'
        });
        $('#timepickerEndTime').datetimepicker({
            format: 'HH:mm'
        });
    });
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
                        <img src="<?php echo $profileImg; ?>" class="avatar img-responsive" alt="Profilkép">
                        <span class="header-username"><?php echo $profileName; ?></span>
                    </button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Menu lenyitása</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#">Valami</a>
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
        <form action="/core/action/add/recurringtrips.php" method="post">
            <p>Induló város:</p>
            <div class="form-label-group">
                <input id="inputStartCity" name="inputStartCity" type="text" />
            </div>
            <p>Érkező város:</p>
            <div class="form-label-group">
                <input id="inputEndCity" name="inputEndCity" type="text" />
            </div>
            <p>Induló dátum:</p>
            <div class="form-group">
                <div class="input-group date" id="datepickerStartDate" data-target-input="nearest">
                    <input type="text" name="datepickerStartDate" class="form-control datetimepicker-input" data-target="#datepickerStartDate"/>
                    <div class="input-group-append" data-target="#datepickerStartDate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <p>Érkező dátum:</p>
            <div class="form-group">
                <div class="input-group date" id="datepickerEndDate" data-target-input="nearest">
                    <input type="text" name="datepickerEndDate" class="form-control datetimepicker-input" data-target="#datepickerEndDate"/>
                    <div class="input-group-append" data-target="#datepickerEndDate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <p>Indulási idő:</p>            
            <div class="form-group">
                <div class="input-group date" id="timepickerStartTime" data-target-input="nearest">
                    <input type="text" name="timepickerStartTime" class="form-control datetimepicker-input" data-target="#timepickerStartTime"/>
                    <div class="input-group-append" data-target="#timepickerStartTime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                    </div>
                </div>
            </div>

            <p>Érkezési idő:</p>
            <div class="form-group">
                <div class="input-group date" id="timepickerEndTime" data-target-input="nearest">
                    <input type="text" name="timepickerEndTime" class="form-control datetimepicker-input" data-target="#timepickerEndTime"/>
                    <div class="input-group-append" data-target="#timepickerEndTime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                    </div>
                </div>
            </div>
            
            <p>Heti rendszeresség:</p>
            <input id="inputWeeklyRecurrence" name="inputWeeklyRecurrence" type="number" value="1" min="1" max="7" step="1"/>
            
            <p>Helyek szama:</p>   
            <input id="inputAvailableSpace" name="inputAvailableSpace" type="number" value="1" min="1" max="10" step="1"/>

            <button class="btn btn-lg btn-secondary btn-block" name="button-add-recurring-trips" type="submit">
                Hozzaadás
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
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/bootstrap-table.min.js"></script>
</body>
</html>