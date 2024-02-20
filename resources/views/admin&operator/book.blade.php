@extends('admin&operator.layout')
@section('container')
@section('title')
    Book
@endsection
<!-- DataTables -->

<!-- Content Header (Page header) -->
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Book</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Buku</li>
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
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#modalCreate">
                            Add Book
                        </button>

                        <!-- Modal Create book  -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Buku</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('book.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input class="form-control @error('title') is-invalid @enderror"
                                                    type="text" name="title" id="">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select name="category_id" id=""
                                                    class="form-control @error('category_id') is-invalid @enderror"">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Rack</label>
                                                <select name="rak_id"
                                                    class="form-control @error('rak_id') is-invalid @enderror"
                                                    id="">
                                                    @foreach ($raks as $rak)
                                                        <option value="{{ $rak->id }}">{{ $rak->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('rak_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Publication Year</label>
                                                <input
                                                    class="form-control @error('pubication_year') is-invalid @enderror""
                                                    type="text" name="publication_year" id="">
                                                @error('publication_year')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">File</label>
                                                <input class="form-control @error('img') is-invalid @enderror""
                                                    type="file" name="img" id="">
                                                @error('img')
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
                        {{-- end modal create book --}}


                        <!-- Modal view -->
                        @foreach ($books as $book)
                            <div class="modal fade" id="modalView{{ $book->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail {{ $book->title }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <img src="{{ asset('storage/book/' . $book->img) }}"
                                                            width="200px" height="270px" alt="">
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
                                                        <p class="book_detail">Stok :
                                                            {{ $book->where('title', $book->title)->count() }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <table border="0" collspan="0"
                                                class="justify-content-center m-auto">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- end modal view --}}

                        {{-- modal update --}}
                        @foreach ($books as $book)
                            <div class="modal fade" id="modalUpdate{{ $book->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Book</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('book.update', $book->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="">Title</label>
                                                    <input class="form-control" type="text" name="title"
                                                        value="{{ $book->title }}" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Category</label>
                                                    <select name="category_id" id="" class="form-control">
                                                        <option value="{{ $book->category_id }}">
                                                            {{ $book->category->category_name }}</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Rack</label>
                                                    <select name="rak_id" id="" class="form-control">
                                                        <option value="{{ $book->rak_id }}">{{ $book->rak->name }}
                                                        </option>
                                                        @foreach ($raks as $rak)
                                                            <option value="{{ $rak->id }}">
                                                                {{ $rak->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Publication year</label>
                                                    <input class="form-control" type="text"
                                                        name="publication_year" value="{{ $book->publication_year }}"
                                                        id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">File</label>
                                                    <input class="form-control" type="file" name="img"
                                                        value="{{ $book->img }}" id="">
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
                        @foreach ($books as $book)
                            <div class="modal fade" id="modalDelete{{ $book->id }}" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete {{ $book->title }} book</h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form method="post" action="{{ route('book.destroy', $book->id) }}">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Do you want delete this book ?</label>
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
                                        <th>Book Code</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Rak </th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $no => $book)
                                        <tr>
                                            <td style="width: 50px;">{{ $books->firstItem() + $no }}</td>
                                            <td>{{ $book->book_code }}</td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->category->category_name }}</td>
                                            <td>{{ $book->rak->name }}</td>
                                            <td><img src="{{ asset('storage/book/' . $book->img) }}" width="50px"
                                                    alt=""></td>
                                            <td style="width: 150px">
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#modalView{{ $book->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modalUpdate{{ $book->id }}"
                                                    class="btn btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modalDelete{{ $book->id }}"
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
