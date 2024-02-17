@extends('/borrower/layout')
@section('container')
    <div class="row">


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
        <p>dafe</p>
            @foreach ($favorites as $favorite)
            <p>{{$favorite->book_id}}</p>
                <div class="product">
                    <div class="product-img">
                        <img src="{{ asset('storage/book/' . $favorite->book->img) }}" width="200px" height="270px" alt="">
                        <div class="product-label">
                            <span class="sale">New</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">{{ $favorite->book_id }}</p>
                        <h3 class="product-name"><a href="#">{{ $favorite->title }}</a></h3>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <a type="button" href="/favorite/{{ $favorite->id }}" class="add-to-wishlist"><i
                                    class="fa fa-heart-o"></i></a>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">
                                    view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <a href="/borrows/{{ $favorite->id }}" class="add-to-cart-btn" style="height: 50px ;!important">
                            borrow </a>
                    </div>
                </div>
            @endforeach
            <!-- /product -->

        <!-- Products tab & slick -->
    </div>
    @include('sweetalert::alert')
@endsection
