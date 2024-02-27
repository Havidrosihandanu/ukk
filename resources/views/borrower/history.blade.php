@extends('/borrower/layout')
@section('container')
    <div class="row">

    @section('title')
        Borrower History
    @endsection
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
                        <div class="product-img" height = "350px">
                            <img src="{{ asset('storage/book/' . $history->book->img) }}" width="200px" height="350px"
                                alt="">
                            <div class="product-label">
                                <span class="sale">History</span>
                            </div>
                        </div>
                        <div class="product-body" style="background-color: rgb(241, 241, 241)">
                            <h3 class="product-name"><a href="#">{{ $history->book->title }}</a></h3>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <button type="button" data-toggle="modal" data-target="#modalView{{ $history->id }}"
                                    class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">
                                    view</span></button>
                                @if ($history->status != 'pending')
                                    <a href="/reviews/{{ $history->book->id }}" class="quick-view"><i
                                            class="fa fa-comments-o"></i><span class="tooltipp">
                                            Review</span></a>
                                @endif
                                @if ($history->status == 'pending')
                                    <a href="/borrower/cancel/{{ $history->id }}"><i class="fa fa-trash"></i><span
                                            class="tooltipp">
                                            Cancel Borrow</span></a>
                                @endif
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
                        <h5 class="modal-title" id="exampleModalLabel">View {{ $history->book->title }} Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('storage/book/' . $history->book->img) }}" width="200px"
                                    height="270px" alt="">
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
                                <p class="book_detail">Status : {{ $history->status }}</p>
                                <p class="book_detail">Borrow Date : {{ $history->borrow_date }}</p>
                                <p class="book_detail">Date Of Return : {{ $history->date_of_return }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($historis as $history)
        <div class="modal fade" id="modalReview{{ $history->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View {{ $history->book->title }} Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <form action="/reviews" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="">Book:</label> <br>
                                        <select name="book_id" id="">
                                            <option tyle="width: 100%;padding:3px" value="{{ $history->book_id }}">
                                                {{ $history->book->title }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Review:</label><br>
                                        <input class="" style="width: 35%;padding:3px" type="text"
                                            name="review" id="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8"> <button style="align-content: center;margin: auto"
                                            type="submit" class=" text-center btn btn-primary"> Send </button></div>
                                    <div class="col-md-2"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endforeach
</div>
@include('sweetalert::alert')
@endsection
