<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Főoldal</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/mdb.min.css">
    <style>
        .carousel-inner img {
            width: 100%;
            height: 780px;
        }
    </style>
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
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <div class="navbar-nav ml-auto">
                <div class="btn-group">
                    <a href="login.php" class="btn btn-secondary">
                        <i class="fas fa-sign-in-alt"></i> Bejelentkezés
                    </a>
                    <a href="register.php" class="btn btn-primary">
                        <i class="fas fa-users"></i> Segítő leszek!
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="uploads/images/carousel/1.jpg" alt="Madar1">
                <div class="carousel-caption d-md-block">
                    <h5>Teszt</h5>
                    <p>Madar1</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="uploads/images/carousel/2.jpg" alt="Madar2">
                <div class="carousel-caption d-md-block">
                    <h5>Teszt2</h5>
                    <p>Madar2</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="uploads/images/carousel/3.jpg" alt="Madar3">
                <div class="carousel-caption d-md-block">
                    <h5>Teszt3</h5>
                    <p>Madar3</p>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Előző</span>
        </a>
        <a class="carousel-control-next" href="#carousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Következő</span>
        </a>
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
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/mdb.min.js"></script>
</body>
</html>