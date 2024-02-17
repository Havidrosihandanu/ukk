@extends('/borrower/layout')
@section('container')
    <div class="row">


        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">Borrowing History</h3>
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
                @foreach ($historis as $history)
                    <div class="col-md-3">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ asset('storage/book/' . $history->book->img) }}" width="200px" height="270px"
                                    alt="">
                                <div class="product-label">
                                    <span class="sale">History</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <h3 class="product-name"><a href="#">{{ $history->book->title }}</a></h3>
                                <div class="product-rating">
                                </div>
                                <div class="product-btns">
                                    <button type="button" data-toggle="modal" data-target="#modalView{{ $history->id }}"
                                        class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">
                                            view</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- /product -->

        <!-- Products tab & slick -->
        
        @foreach ($historis as $history)
        <div class="modal fade" id="modalView{{ $history->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('storage/book/' . $history->book->img) }}" width="200px" height="270px"
                                    alt="">
                            </div>
                            <div class="col-md-6">
                                <style>
                                    .book_detail {
                                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
                                        font-size: 15px;
                                    }
                                    </style>
                                <p class="book_detail">Title : {{ $history->book->title }}</p>
                                <p class="book_detail">Book Code : {{ $history->book->book_code }}</p>
                                <p class="book_detail">Borrow Date : {{ $history->borrow_date }}</p>
                                <p class="book_detail">Date Of Return : {{ $history->date_of_return }}</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
        </div>
            @include('sweetalert::alert')
            @endsection
