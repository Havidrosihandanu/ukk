<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="peminjam/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="peminjam/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="peminjam/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="peminjam/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="peminjam/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="peminjam/css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        {{-- <div id="top-header">
				<div class="container">
					
				</div>
			</div> --}}
        <!-- /TOP HEADER -->
        <?php
        use App\Models\Favorite;
        $userId = auth()->user()->id;
        $favoriteCount = Favorite::where('user_id', $userId)->count();
        ?>
        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="/borrower" class="logo">
                                <img src="./peminjam/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <select class="input-select">
                                    <option value="0">All Categories</option>
                                    <option value="1">Category 01</option>
                                    <option value="1">Category 02</option>
                                </select>
                                <input class="input" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn" style="width: 310px !important ">
                            <!-- Wishlist -->
                            <div>
                                <a href="/favorite">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Favorite</span>
                                    <div class="qty">{{ $favoriteCount }}</div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <i class="fa fa-user"></i>
                                    <p>{{ auth()->user()->full_name }}</p>
                                </a>
                            </div>
                            <div>
                                <a>
                                    <i class="fa fa-sign-out"></i>
                                    <form action="/logout" method="POST">
                                        @method('post')
                                        @csrf
                                        <button type="submit"
                                            style="border: none;background-color: rgba(255, 255, 255, 0)">Logout</button>
                                    </form>
                                </a>
                            </div>
                            <div>
                                <a href="/history">
                                    <i class="fa fa-heart-o"></i>
                                    <span>History</span>
                                    <div class="qty">{{ $favoriteCount }}</div>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li><a href="#">Novel</a></li>
                    <li><a href="#">Kamus</a></li>
                    <li><a href="#">Biografi</a></li>
                    <li><a href="#">Ensiklopedia</a></li>
                    <li><a href="#">Majalah</a></li>
                    <li><a href="#">Komik</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            @yield('container')
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Novel</a></li>
                                <li><a href="#">Kamus</a></li>
                                <li><a href="#">Biografi</a></li>
                                <li><a href="#">Ensiklopedia</a></li>
                                <li><a href="#">Majalah</a></li>
                                <li><a href="#">Komik</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="footer">
                            <h3 class="footer-title">Tentang kami</h3>
                            <p>Perpustakaan Digital merupakan platform yang menyediakan berbagai macam buku yang dapat
                                diakses dimanapun dan kapanpun.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>Jl. Gajah Mada No.54 Bungkal </a>
                                </li>
                                <li><a href="#"><i class="fa fa-phone"></i>0857 8427 3296</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>perpustakaan@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="clearfix visible-xs"></div>


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        {{-- <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div> --}}
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="peminjam/js/jquery.min.js"></script>
    <script src="peminjam/js/bootstrap.min.js"></script>
    <script src="peminjam/js/slick.min.js"></script>
    <script src="peminjam/js/nouislider.min.js"></script>
    <script src="peminjam/js/jquery.zoom.min.js"></script>
    <script src="peminjam/js/main.js"></script>

</body>

</html>
