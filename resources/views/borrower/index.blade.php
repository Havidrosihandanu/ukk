@extends('/borrower/layout')
@section('container')
    <div class="row">

        <?php
        use App\Models\Book;
        $books = Book::all();
        ?>

        <!-- section title -->
        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">New Products</h3>
                {{-- <div class="section-nav">
                    <ul class="section-tab-nav tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Novel</a></li>
                        <li><a data-toggle="tab" href="#tab1">Biografi</a></li>
                        <li><a data-toggle="tab" href="#tab1">Fiksi</a></li>
                        <li><a data-toggle="tab" href="#tab1">Pelajaran</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
        <!-- /section title -->

        <!-- Products tab & slick -->
        <div class="col-md-12">
            <div class="row">
                <div class="products-tabs">
                    <!-- tab -->
                    <div id="tab1" class="tab-pane active">
                        <div class="products-slick" data-nav="#slick-nav-1">
                            @foreach ($books as $book)
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ asset('storage/book/' . $book->img) }}" width="200px" height="270px"
                                            alt="">
                                        <div class="product-label">
                                            <span class="sale">New</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $book->category->category_name }}</p>
                                        <h3 class="product-name"><a href="#">{{ $book->title }}</a></h3>
                                        <div class="product-rating">
                                        </div>
                                        <div class="product-btns">
                                            <a type="button" href="/favorite/{{$book->id}}" class="add-to-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">
                                                    view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="/borrows/{{ $book->id }}" class="add-to-cart-btn"
                                            style="height: 50px ;!important"> borrow </a>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /product -->

                        </div>
                        <div id="slick-nav-1" class="products-slick-nav"></div>
                    </div>
                    <!-- /tab -->
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">All Book</h3>
                {{-- <div class="section-nav">
                    <ul class="section-tab-nav tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Novel</a></li>
                        <li><a data-toggle="tab" href="#tab1">Biografi</a></li>
                        <li><a data-toggle="tab" href="#tab1">Fiksi</a></li>
                        <li><a data-toggle="tab" href="#tab1">Pelajaran</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>

        @foreach ($books as $book)
            <div class="col-md-3">
                <div class="row ">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset('storage/book/' . $book->img) }}" width="200px" height="270px"
                                alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{ $book->category->category_name }}</p>
                            <h3 class="product-name"><a href="#">{{ $book->title }}</a></h3>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                 <a type="button" href="/favorite/{{$book->id}}" class="add-to-wishlist"><i class="fa fa-heart-o"></i></a>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">
                                        view</span></button>
                                <a href="/borrow/{{ $book->id }}" class="add-to-wishlish " style="height: 50px ;!important">
                                    borrow </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Products tab & slick -->
    </div>
    @include('sweetalert::alert')
@endsection
