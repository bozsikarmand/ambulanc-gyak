<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Vezérlőpult</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome/css/all.min.css">
    <style>
        .avatar {
            vertical-align: middle;
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }
        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }
        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }
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
            <form class="mx-5 my-0 d-inline w-75">
                <div class="input-group">
                    <input type="text" class="form-control border border-right-0" placeholder="Keresés">
                    <span class="input-group-append">
                    <button class="btn btn-primary border border-left-0" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
            </form>
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
                    <button type="button" class="btn btn-info">
                        <img src="https://via.placeholder.com/20" class="avatar img-responsive" alt="Profilkép">
                        <span class="header-username">Chuck Norris</span>
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

    <div class="mx-0 my-auto d-inline" id="wrapper">
        <div class="bg-dark border-right" id="sidebar-wrapper">        
            <div class="sidebar-heading">Teszt</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                    <i class="fas fa-tachometer-alt"></i> Vezérlőpult
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                    <i class="fas fa-chart-pie"></i> Statisztikák
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                    <i class="fas fa-users"></i> Felhasználók</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                    <i class="fas fa-dove"></i> Állatok
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                    <i class="fas fa-building"></i> Állomások
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                    <i class="fas fa-shuttle-van"></i> Szállitások</a>
            </div>
        </div>
    </div>

    <div class="table-responsive mx-0 my-auto d-inline">
        <table class="table table-striped table-dark">
            <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Teszt</th>
                        <th scope="col">Teszt</th>
                        <th scope="col">Teszt</th>
                    </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Aladár</td>
                    <td>Bálint</td>
                    <td>Cecilia</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Dália</td>
                    <td>Elemér</td>
                    <td>Ferenc</td>
                    </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Gábor</td>
                    <td>Hugó</td>
                    <td>Irén</td>
                </tr>
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
<script src="../../assets/js/jquery-3.4.1.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>