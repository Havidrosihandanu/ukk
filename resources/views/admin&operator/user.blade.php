@extends('admin&operator.layout')
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
                    <!-- /.card-body -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#modalCreate">
                            Add User
                        </button>
                        <!-- Modal create -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('user.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Full Name</label>
                                                <input class="form-control @error('full_name') is-invalid @enderror" type="text"  name="full_name" id="">
                                                @error('full_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="">
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="">
                                                @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input class="form-control @error('password') is-invalid @enderror" type="text" name="address"id="">
                                                @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <select class="form-control @error('password') is-invalid @enderror" name="role_id" id="">
                                                    <option value="" > Select role : </option>
                                                    @foreach ($role as $roles)
                                                        <option value="{{ $roles->id }}" class="form-control">
                                                            {{ $roles->role }}</option>
                                                    @endforeach
                                                </select>
                                                @error('address')
                                                <span class="text-danger">{{$message}}</span>
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
                                                    <td class="td_view">Full Name</td>
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
                                                    <td class="td_view">Address</td>
                                                    <td class="">: {{ $user->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="td_view">Role</td>
                                                    <td class="">: {{ $user->role->role }}</td>
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
                            <div class="modal fade" id="modalDelete{{ $user->id }}" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete {{ $user->full_name }} </h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form method="post" action="{{ route('user.destroy', $user->id) }}">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Do you want delete this user ?</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i>Delete```</button>
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
                            <div class="modal fade" id="modalUpdate{{ $user->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Data  {{ $user->full_name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('user.update', $user->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input class="form-control" type="text" name="full_name"
                                                        id="" value="{{ $user->full_name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input class="form-control" type="email" name="email"
                                                        id="" value="{{ $user->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <input class="form-control" type="text" name="address"
                                                        id="" value="{{ $user->address }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Role</label>
                                                    <select class="form-control" name="role_id" id="">
                                                        <option value="{{$user->role->id}}">{{$user->role->role}}</option>
                                                        @foreach ($role as $roles)
                                                            <option value="{{ $roles->id }}" class="form-control">
                                                                {{ $roles->role }}</option>
                                                        @endforeach
                                                    </select>
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
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $no => $user)
                                        <tr>
                                            <td style="width: 50px;">{{ $users->firstItem() + $no }}</td>
                                            <td>{{ $user->full_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->role }}</td>
                                            <td style="width: 150px">
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#modalView{{ $user->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modalUpdate{{ $user->id }}"
                                                    class="btn btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modalDelete{{ $user->id }}"
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
