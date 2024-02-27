<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title> SI PUSTAKA | Borrower</title>

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
                                <img src=" /borrower.png" style="margin-top: 8px" alt="" width="220px"
                                    height="60px">
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
                                    <input class="input-select" style="width: 400px " value="{{ old('search') }}"
                                        name="search" placeholder="Search here">
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
                        <li><a type="button" href="/category/{{ $category->id }}">{{ $category->category_name }}</a>
                        </li>
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
            <!-- row -->

            <div class="row">

                @section('title')
                    Favorite Book
                @endsection
                <div class="row">
                    <div class="container">
                        @foreach ($books as $bookk)
                            <div class="col-md-3">
                                <div class="product">
                                    <div class="product-img" height="350px">
                                        <img src="{{ asset('storage/book/' . $bookk->img) }}" width="200px"
                                            height="350px" alt="">
                                        <div class="product-label">
                                            <span class="sale">{{ $bookk->category->category_name }}</span>
                                        </div>
                                    </div>
                                    <div class="product-body" style="background-color: rgb(241, 241, 241)">
                                        <h3 class="product-name"><a href="#">{{ $bookk->title }}</a></h3>
                                        <div class="product-rating">
                                        </div>
                                        <div class="product-btns">
                                            <button type="button" data-toggle="modal"
                                                data-target="#modalView{{ $bookk->id }}" class="quick-view"><i
                                                    class="fa fa-eye"></i><span class="tooltipp">
                                                    view</span></button>
                                            <a href="/borrows/{{ $bookk->book_code }}/{{ $bookk->id }}"
                                                class="add-to-cart-btn" style="height: 50px ;!important"> borrow </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /product -->
                @foreach ($books as $book)
                    <div class="modal fade" id="modalView{{ $book->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">View {{ $book->title }} Book</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <img src="{{ asset('storage/book/' . $book->img) }}" width="200px"
                                                height="270px" alt="">
                                        </div>
                                        <div class="col-md-6">
                                            <style>
                                                .book_detail {
                                                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
                                                    font-size: 15px;
                                                }
                                            </style>
                                            <p class="book_detail">Title : {{ $book->title }}</p>
                                            <p class="book_detail">Book Code : {{ $book->book_code }}</p>
                                            <p class="book_detail">Category :
                                                {{ $book->category->category_name }}</p>
                                            <p class="book_detail">Raks :
                                                {{ $book->rak->name }}</p>
                                            <p class="book_detail">Publication Year :
                                                {{ $book->publication_year }}</p>
                                            {{-- <p class="book_detail">Stok :
                                        {{ $book->where('title', $book->title)->count() }}</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Products tab & slick -->
            </div>
            @include('sweetalert::alert')

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
                    <div class="col-md-12 col-xs-12 text-center">
                        <div class="footer">
                            <h3 class="footer-title">SIPUSTAKA</h3>
                            <p>Sistem Informasi Perpustakaan adalah sebuah sistem yang dirancang dan digunakan untuk
                                mengelola semua aktivitas yang terkait dengan pengelolaan dan pengoperasian sebuah
                                perpustakaan. Tujuan utama dari sistem informasi perpustakaan adalah untuk menyediakan
                                akses yang efisien dan efektif terhadap sumber daya informasi yang tersedia di
                                perpustakaan tersebut. Sistem ini mencakup berbagai fungsi, termasuk pengelolaan
                                katalog, borroweran dan pengembalian buku, manajemen anggota, pelacakan inventaris,
                                serta layanan referensi dan penelusuran.</p>
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
