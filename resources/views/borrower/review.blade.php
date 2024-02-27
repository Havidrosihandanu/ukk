<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title> SI  PUSTAKA | Review </title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/borrower/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/borrower/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="/borrower/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/borrower/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/borrower/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/borrower/css/style.css" />

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
        use App\Models\Categorie;
        $categories = Categorie::all();

        use App\Models\Favorite;
        use App\Models\Borrow;
        $userId = auth()->user()->id;
        $favoriteCount = Favorite::where('user_id', $userId)->count();
        $historyCount = Borrow::where('user_id', $userId)->count();
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
                            <a href="/borrowerr" class="logo">
                                <img src=" /borrower.png" style="margin-top: 8px" alt="" width="220px" height="60px"> 
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search" style="width: 500px;">
                            <div class="header-search" style="width: 600px;">
                                <form action="/borrowerr" method="GET">
                                    @csrf
                                    <input class="input-select" style="width: 400px " value="{{ old('search') }}" name="search"
                                        placeholder="Search here">
                                    <input type="submit" class="search-btn" value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn" style="width: 420px !important ">
                            <!-- Wishlist -->
                            <div>
                                <a href="/favorite">
                                    <i class="fa fa-heart-o"></i>
                                    <span>Favorite</span>
                                    <div class="qty">{{ $favoriteCount }}</div>
                                </a>
                            </div>
                            <div>
                                <a href="/history">
                                    <i class="fa fa-history"></i>
                                    <span>History</span>
                                    <div class="qty">{{ $historyCount }}</div>
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
                    @foreach ($categories as $category)
                    <li><a type="button" href="/category/{{{$category->id}}}">{{$category->category_name}}</a></li>
                    @endforeach
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
    @foreach ($books as $book)
        <div class="col-md-12" style="margin: auto">
            <div class="row ">
                <div class="product" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-img" height="470px !important">
                                <img src="{{ asset('storage/book/' . $book->img) }}" width="150px" height="600px !important"
                                alt="">
                            </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="product-body " style="margin-top: 100px">
                                    <div class="product-btns " >
                                        <form action="/reviews/{{$book->id}}" method="POST"
                                        enctype="multipart/form-data" style="padding: 0px; 
                                        text-align: center;
                                        width: 500px;
                                        margin: auto;
                                        font-size: 20px;
                                        height: 500px !important;
                                        display: table;">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <input type="text" value="{{$book->id}}" hidden name="" id="">
                                            <h3 class="product-name">
                                                <label for="">Review : {{$book->title}}</label>
                                            </h3>
                                            <input class="product" style="width: 100%; height: 200px; padding:3px;border:none" type="" name="review"
                                                id="">
                                        </div>
                                        <div class="col-md-12">
                                             <button style="align-content: center;margin: auto"
                                                type="submit" class=" text-center btn btn-primary"> Send 
                                            </button>
                                        </div>
                                    </form>
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    <!-- Products tab & slick -->
    @include('sweetalert::alert')
</div>

<!-- /row -->
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
                <div class="col-md-12 col-xs-12 text-center">
                    <div class="footer">
                        <h3 class="footer-title">SIPUSTAKA</h3>
                        <p>Sistem Informasi Perpustakaan adalah sebuah sistem yang dirancang dan digunakan untuk mengelola semua aktivitas yang terkait dengan pengelolaan dan pengoperasian sebuah perpustakaan. Tujuan utama dari sistem informasi perpustakaan adalah untuk menyediakan akses yang efisien dan efektif terhadap sumber daya informasi yang tersedia di perpustakaan tersebut. Sistem ini mencakup berbagai fungsi, termasuk pengelolaan katalog, borroweran dan pengembalian buku, manajemen anggota, pelacakan inventaris, serta layanan referensi dan penelusuran.</p>
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
<script src="/borrower/js/jquery.min.js"></script>
<script src="/borrower/js/bootstrap.min.js"></script>
<script src="/borrower/js/slick.min.js"></script>
<script src="/borrower/js/nouislider.min.js"></script>
<script src="/borrower/js/jquery.zoom.min.js"></script>
<script src="/borrower/js/main.js"></script>

</body>

</html>