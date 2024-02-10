@extends('layout')
@section('container')

    <!-- DataTables -->

    <!-- Content Header (Page header) -->
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                            Tambah User
                        </button>
                        <!-- Modal create -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('user.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Nama Lengkap</label>
                                                <input class="form-control" type="text" name="full_name"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input class="form-control" type="text" name="username"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input class="form-control" type="email" name="email"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input class="form-control" type="password" name="password"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <input class="form-control" type="text" name="address"
                                                    id="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <select class="form-control" name="role_id" id="">
                                                    <option value="1" class="form-control">p</option>
                                                </select>
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
                        {{-- end modal create --}}

                        <!-- Modal view -->
                        @foreach ($users as $user)
                            <div class="modal fade" id="modalView{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail {{ $user->full_name }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table border="0" collspan="0">
                                                <tr>
                                                    <td class="td_view">Nama Lengkap</td>
                                                    <td class="">: {{ $user->full_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="td_view">Username</td>
                                                    <td class="">: {{ $user->username }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="td_view">Email</td>
                                                    <td class="">: {{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="td_view">Alamat</td>
                                                    <td class="">: {{ $user->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="td_view">Role</td>
                                                    <td class="">: {{ $user->role_id }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- end modal view --}}
                        {{-- modal delete --}}
                        @foreach ($users as $user)
                            <div class="modal fade" id="modalHapus{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Data Layanan </h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form method="post" action="{{ route('user.destroy', $user->id) }}">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Apakah Anda ingin Menghapus Data Ini?</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i>Hapus</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- end modal delete --}}
                        {{-- modal update --}}
                        @foreach ($users as $user)
                        <div class="modal fade" id="modalUpdate{{$user->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Data User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input class="form-control" type="text" name="full_name"
                                                id="" value="{{$user->full_name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input class="form-control" type="text" name="username"
                                                id="" value="{{$user->username}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input class="form-control" type="email" name="email"
                                                id="" value="{{$user->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input class="form-control" type="password" name="password"
                                                id="" value="{{$user->password}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input class="form-control" type="text" name="address"
                                                id="" value="{{$user->address}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <select class="form-control" name="role_id" id="">
                                               @foreach ($role as $roles)
                                               <option value="{{$roles->id}}" class="form-control">{{$roles->role}}</option>
                                               @endforeach
                                            </select>
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
                        @endforeach
                        {{-- end modal update --}}
                     
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td style="width: 50px;">1</td>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->role }}</td>
                                        <td style="width: 150px">
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#modalView{{ $user->id }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <button type="button" data-toggle="modal"
                                                data-target="#modalUpdate{{ $user->id }}" class="btn btn-warning">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button type="button" data-toggle="modal"
                                                data-target="#modalHapus{{ $user->id }}" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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
