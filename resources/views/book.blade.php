@extends('layout')
@section('container')

    <!-- DataTables -->

    <!-- Content Header (Page header) -->
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                    <div class="card-header">
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Buku
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
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
                                                <label for="">Judul</label>
                                                <input class="form-control" type="text" name="title"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Penulis</label>
                                                <input class="form-control" type="text" name="writer"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Penerbit</label>
                                                <input class="form-control" type="text" name="publisher"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select name="category_id" id="" class="form-control">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tahun terbit</label>
                                                <input class="form-control" type="text" name="publication_year"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">File</label>
                                                <input class="form-control" type="file" name="img"
                                                    id="">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td style="width: 50px;">1</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->category }}</td>
                                        <td>{{ $book->stok }}</td>
                                        <td style="width: 150px">
                                            <a href="" class="btn btn-success"><i
                                                    class="fa-solid fa-eye"></i></a>
                                            <a href="" class="btn btn-warning"><i
                                                    class="fa-solid fa-pen-to-square"></i></i></a>
                                            {{-- <a href="{{route('book.destroy')}}" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{-- <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                </tr> --}}
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>



@endsection
