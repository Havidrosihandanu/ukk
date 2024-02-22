@extends('/borrower/layout')
@section('container')
    <div class="row">

    @section('title')
        Favorite Book
    @endsection
    <div class="col-md-12">
        <div class="section-title">
            <h3 class="title">Favorite Book</h3>
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
    <div class="row">
        <div class="container">
            @foreach ($favorites as $favorite)
                <div class="col-md-3">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset('storage/book/' . $favorite->book->img) }}" width="200px" height="270px"
                                alt="">
                            <div class="product-label">
                                <span class="sale">Favorite</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <h3 class="product-name"><a href="#">{{ $favorite->book->title }}</a></h3>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <button type="button" data-toggle="modal" data-target="#modalView{{ $favorite->id }}"
                                    class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">
                                        view</span></button>
                                <a href="/favorite/delete/{{$favorite->id }}"
                                    class="quick-view"><i class="fa fa-trash"></i><span class="tooltipp">
                                        Delete</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /product -->
    @foreach ($favorites as $favorite)
        <div class="modal fade" id="modalView{{ $favorite->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View {{ $favorite->book->title }} Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('storage/book/' . $favorite->book->img) }}" width="200px"
                                    height="270px" alt="">
                            </div>
                            <div class="col-md-6">
                                <style>
                                    .book_detail {
                                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
                                        font-size: 15px;
                                    }
                                </style>
                                <p class="book_detail">Title : {{ $favorite->book->title }}</p>
                                <p class="book_detail">Book Code : {{ $favorite->book->book_code }}</p>
                                <p class="book_detail">Category :
                                    {{ $favorite->book->category->category_name }}</p>
                                <p class="book_detail">Raks :
                                    {{ $favorite->book->rak->name }}</p>
                                <p class="book_detail">Publication Year :
                                    {{ $favorite->book->publication_year }}</p>
                                {{-- <p class="book_detail">Stok :
                                    {{ $favorite->where('title', $book->title)->count() }}</p> --}}
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
@endsection
