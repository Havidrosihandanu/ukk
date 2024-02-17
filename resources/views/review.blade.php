@extends('layout')
@section('container')
@section('title')
    User
@endsection
<!-- DataTables -->

<!-- Content Header (Page header) -->
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Review</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Review</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-body -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#modalCreate">
                            Add Review
                        </button>
                        <!-- Modal create -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('review.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Full Name</label>
                                                <input class="form-control @error('user_id') is-invalid @enderror"
                                                    type="text" name="user_id" id="">
                                                @error('user_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Book </label>
                                                <select class="form-control @error('book_id') is-invalid @enderror"
                                                    name="book_id" id="">
                                                    <option value=""> Select book : </option>
                                                    @foreach ($books as $book)
                                                        <option value="{{ $book->id }}" class="form-control">
                                                            {{ $book->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('book_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Review</label>
                                                <input class="form-control @error('review') is-invalid @enderror"
                                                    type="text" name="review" id="">
                                                @error('review')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-success float-right">Save
                                                changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end modal create --}}

                        <!-- Modal view -->
                        @foreach ($reviews as $review)
                            <div class="modal fade" id="modalView{{ $review->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail {{ $review->user_id }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table border="0" collspan="0">
                                                <tr>
                                                    <td class="td_view">Full Name</td>
                                                    <td class="">: {{ $review->user_id }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="td_view">Book</td>
                                                    <td class="">: {{ $review->book_id }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="td_view">Review</td>
                                                    <td class="">: {{ $review->review }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- end modal view --}}

                        {{-- modal delete --}}
                        @foreach ($reviews as $review)
                            <div class="modal fade" id="modalDelete{{ $review->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete {{ $review->user_id }} </h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form method="post" action="{{ route('review.destroy', $review->id) }}">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Do you want delete this review ?</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i>Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- end modal delete --}}

                        {{-- modal update --}}
                        @foreach ($reviews as $review)
                            <div class="modal fade" id="modalUpdate{{ $review->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                {{ $review->full_name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"> 
                                            <form action="{{ route('review.update', $review->id) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input class="form-control @error('user_id') is-invalid @enderror"
                                                        type="text" name="user_id" id=""
                                                        value="{{ $review->user_id }}">
                                                    @error('user_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Book </label>
                                                    <select class="form-control @error('book_id') is-invalid @enderror"
                                                        name="book_id" id="">
                                                        <option value="{{ $review->book_id }}">
                                                            {{ $review->book_id }} </option>
                                                        @foreach ($books as $book)
                                                            <option value="{{ $book->id }}" class="form-control">
                                                                {{ $book->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('book_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Review</label>
                                                    <input class="form-control @error('review') is-invalid @enderror"
                                                        type="text" name="review" id="">
                                                    @error('review')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-success float-right">Save
                                                    changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- end modal update --}}

                        {{-- user table --}}
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Full Name</th>
                                        <th>Book</th>
                                        <th>Review</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $no => $review)
                                        <tr>
                                            <td style="width: 50px;">{{ $reviews->firstItem() + $no }}</td>
                                            <td>{{ $review->user_id }}</td>
                                            <td>{{ $review->book_id }}</td>
                                            <td>{{ $review->review }}</td>
                                            <td style="width: 150px">
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#modalView{{ $review->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modalUpdate{{ $review->id }}"
                                                    class="btn btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modalDelete{{ $review->id }}"
                                                    class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{-- end user table --}}

                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    {{-- alert --}}
    @include('sweetalert::alert')
</section>

@endsection
