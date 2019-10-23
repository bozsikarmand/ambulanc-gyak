<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Főoldal</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome/css/all.min.css">
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
                <li class="nav-item">
                    <a href="list/users.php" class="list-group-item list-group-item-action bg-dark text-light">
                        <i class="fas fa-users"></i> Felhasználók
                    </a>
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

    <div id="container-fullwidth">
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc enim neque, dictum eget leo ut, luctus tincidunt lectus. Nam vel euismod ante. Fusce vitae euismod velit, eu pellentesque ipsum. In eget diam iaculis, maximus ligula sit amet, euismod augue. Aliquam erat volutpat. Vivamus et erat rutrum, feugiat dolor eu, aliquam dui. Suspendisse eu magna at nisl congue feugiat. Nunc sed tempus dui, nec ornare ante. Suspendisse condimentum fermentum nisi quis tempor. Morbi posuere consequat varius. Nunc ornare laoreet egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

Aliquam venenatis, purus ut cursus euismod, mauris sapien blandit elit, in pulvinar purus turpis id ligula. Sed non faucibus justo. Cras rutrum congue lobortis. Vestibulum volutpat eget enim nec tempus. Etiam at faucibus odio. Mauris eleifend lorem ultrices libero pulvinar condimentum. Praesent nec neque sit amet nisl euismod aliquam. Donec ac enim erat. Pellentesque suscipit bibendum ornare. Ut vel purus id mi sodales eleifend id vitae tellus. Vestibulum vel nulla pharetra, lobortis neque eu, consectetur turpis.

Maecenas suscipit quis libero nec hendrerit. Aenean tristique dictum turpis quis accumsan. In hac habitasse platea dictumst. Proin posuere pharetra dignissim. Integer a tortor gravida, tristique enim ut, dignissim ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis bibendum varius velit, sed fringilla sem bibendum eget. Donec a luctus turpis. Pellentesque lacinia volutpat lorem vel lacinia. Aliquam id erat luctus ante malesuada semper.

Nunc suscipit euismod enim vel feugiat. Etiam quis sapien feugiat, blandit sem a, vehicula dui. Maecenas eu orci dignissim, efficitur dui nec, posuere ligula. Maecenas laoreet, sapien fringilla pretium laoreet, purus odio vulputate ligula, ut euismod enim nisl sit amet mi. Nam fermentum elementum risus vitae rhoncus. Nunc consequat, nisi a consectetur vehicula, est purus molestie nulla, eu venenatis ex neque ut diam. Donec condimentum, diam pellentesque auctor lobortis, sem nunc consequat leo, ut sodales mauris velit id sapien. Suspendisse vestibulum nisi id diam vehicula, sit amet luctus dui pulvinar. Nam condimentum enim urna. Ut dapibus, erat sed tincidunt rutrum, diam ligula tincidunt libero, vel fermentum turpis elit ac libero. Cras magna tellus, consectetur vel maximus at, fringilla sed sem. Pellentesque venenatis vulputate odio quis condimentum. Ut nec consequat odio.

Integer vel tincidunt lacus. Vivamus sit amet laoreet nisl, in imperdiet turpis. Vivamus ac convallis nulla, eu egestas velit. Pellentesque feugiat mollis viverra. Pellentesque libero risus, volutpat in accumsan luctus, gravida non velit. Quisque eget est eget justo feugiat congue. Nam in risus eu eros elementum posuere. Aliquam hendrerit massa sem, id vulputate justo posuere in. Nunc at iaculis lacus, eu ornare nisi. In pharetra, sapien nec dignissim suscipit, nisl lacus facilisis quam, at faucibus tellus nunc efficitur eros. Nunc aliquet ex non nunc ullamcorper egestas. Vivamus eros metus, posuere ac nisi a, tempus hendrerit lacus. Integer quis urna congue, hendrerit nunc eget, faucibus mi. Mauris sed elit quis nibh consequat placerat. Donec at feugiat enim.
        </p> 
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

