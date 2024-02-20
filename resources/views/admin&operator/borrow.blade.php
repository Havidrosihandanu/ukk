@extends('admin&operator.layout')
@section('container')
@section('title')
    Borrow
@endsection
<!-- DataTables -->

<!-- Content Header (Page header) -->
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Borrow</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Borrow</li>
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
                    <!-- /.card-header -->
                    <div class="card-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger"> {{ $errors->first() }} </div>
                        @endif
                        {{-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#modalCreate">
                            Borrow
                        </button> --}}

                        <!-- Modal Create borrow  -->
                        {{-- <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Borrow</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('borrow.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="form-group">
                                                <label for="">Borrower Name</label>
                                                <select name="user_id" id=""
                                                    class="form-control @error('user_id') is-invalid @enderror"">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">
                                                            {{ $user->full_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('user_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Book</label>
                                                <select name="book_id" id=""
                                                    class="form-control @error('book_id') is-invalid @enderror"">
                                                    @foreach ($books as $book)
                                                        <option value="{{ $book->id }}">
                                                            {{ $book->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('book_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Borrow Date</label>
                                                <input class="form-control @error('borrow_date') is-invalid @enderror""
                                                    type="date" name="borrow_date" id="">
                                                @error('borrow_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Date Of Return</label>
                                                <input
                                                    class="form-control @error('date_of_return') is-invalid @enderror""
                                                    type="date" name="date_of_return" id="">
                                                @error('date_of_return')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="status"
                                                    class="form-control @error('status') is-invalid @enderror"
                                                    id="">
                                                    <option value="Pending">Pending</option>
                                                    <option value="Borrowed">Borrowed</option>
                                                    <option value="Borrowed">Returned</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary float-right">Save
                                                changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- end modal create book --}}


                        <!-- Modal view -->
                        {{-- @foreach ($borrows as $borrow)
                            <div class="modal fade" id="modalView{{ $borrow->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail {{ $borrow->title }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <style>
                                                            .book_detail {
                                                                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
                                                                font-size: 15px;
                                                            }
                                                        </style>
                                                        <p class="book_detail">Borrower : {{ $borrow->user->title }}</p>
                                                        <p class="book_detail">Book :
                                                            {{ $borrow->book->title }}</p>
                                                        <p class="book_detail">Borrow Da :
                                                            {{ $borrow->publication_year }}</p>
                                                    </div>
                                                </div>
                                                <table border="0" collspan="0"
                                                    class="justify-content-center m-auto">

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach --}}
                        {{-- end modal view --}}

                        {{-- modal update --}}
                        @foreach ($borrows as $borrow)
                            <div class="modal fade" id="modalUpdate{{ $borrow->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Loan Updates </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('borrow.update', $borrow->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="">Borrow Date</label>
                                                    <input
                                                        class="form-control @error('borrow_date') is-invalid @enderror""
                                                        type="date" name="borrow_date" id=""
                                                        value="{{ $borrow->borrow_date }}">
                                                    @error('borrow_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Date Of Return</label>
                                                    <input
                                                        class="form-control @error('date_of_return') is-invalid @enderror""
                                                        type="date" name="date_of_return" id=""
                                                        value="{{ $borrow->date_of_return }}">
                                                    @error('date_of_return')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="status"
                                                        class="form-control @error('status') is-invalid @enderror"
                                                        id="">
                                                        <option value="Pending">Pending</option>
                                                        <option value="Borrowed">Borrowed</option>
                                                        <option value="Returned">Returned</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary float-right">Save
                                                    changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- end modal update --}}

                        {{-- modal delete --}}
                        @foreach ($borrows as $borrow)
                            <div class="modal fade" id="modalDelete{{ $borrow->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Remove Borrowing {{ $borrow->title }} </h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form method="post" action="{{ route('borrow.destroy', $borrow->id) }}">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Do you want delete this ?</label>
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

                        {{-- book table --}}
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Borrow Code</th>
                                        <th>Borrower</th>
                                        <th>Book</th>
                                        <th>Borrower Date</th>
                                        <th>Date Of Return</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($borrows as $no => $borrow)
                                        <tr>
                                            <td style="width: 50px;">{{ $borrows->firstItem() + $no }}</td>
                                            <td>{{ $borrow->borrow_code }}</td>
                                            <td>{{ $borrow->user->full_name }}</td>
                                            <td>{{ $borrow->book_code }}</td>
                                            <td>{{ $borrow->borrow_date }}</td>
                                            <td>{{ $borrow->date_of_return }}</td>
                                            <td>{{ $borrow->status }}</td>
                                            <td style="width: 150px">
                                                {{-- <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#modalView{{ $borrow->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button> --}}
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modalUpdate{{ $borrow->id }}"
                                                    class="btn btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modalDelete{{ $borrow->id }}"
                                                    class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{-- end book table --}}
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    @include('sweetalert::alert')
</section>



@endsection
