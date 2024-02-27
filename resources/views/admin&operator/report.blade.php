@extends('admin&operator.layout')
@section('container')
@section('title')
    Report
@endsection
<!-- DataTables -->

<!-- Content Header (Page header) -->
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Generate Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Generate Report</li>
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

                    <form action="/report" method="GET">
                        <div class="row">
                            @csrf
                            <div class="col-md-2">
                                <div class="form-group m-4">
                                    <label for="">Early Date</label>
                                    <input name="borrow_date" value="{{old('borrow_date',date('Y-m-d'))}}" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group m-4">
                                    <label for="">End Date</label>
                                    <input name="end_date" value="{{old('end_date',date('Y-m-d'))}}" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <div class="col-md-4 mt-2">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger"> {{ $errors->first() }} </div>
                        @endif

                        {{-- book table --}}
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Borrower</th>
                                        <th>Book</th>
                                        <th>Borrower Date</th>
                                        <th>Date Of Return</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $no => $report)
                                        <tr>
                                            <td style="width: 50px;">{{ $reports->firstItem() + $no }}</td>
                                            <td>{{ $report->user->full_name }}</td>
                                            <td>{{ $report->book->title }}</td>
                                            <td>{{ $report->borrow_date }}</td>
                                            <td>{{ $report->date_of_return }}</td>
                                            <td>
                                                <p class="badge bg-success">{{ $report->status }}</p>
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
