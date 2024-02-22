

@extends('admin&operator.layout')

@section('container')
@section('title')
    Dashboard
@endsection
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box" style="background: #1455eb;color: white">
            <div class="inner">
                <h3>{{ $user }}</h3>
                <p>User</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-solid fa-user"></i>
            </div>
            <a href="/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box " style="background: #5f5f5f;color: white">
            <div class="inner">
                <h3>{{$book}}<sup style="font-size: 20px"></sup></h3>
                <p>Book</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="/book" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box" style="background: #16827e;color: white">
            <div class="inner">
                <h3>{{$bookBorrowed}}</h3>
                <p>Book Borrowed</p>
            </div>
            <div class="icon">
                <i class="fa fa-tasks"></i>
            </div>
            <a href="/borrow" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$report}}</h3>
                <p>Report Total</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/report" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>

{{-- <div class="row">
    <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Borrowing
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="revenue-chart-canvas" height="375" style="height: 300px; display: block; width: 676px;" width="845" class="chartjs-render-monitor"></canvas>
             </div>
            {{-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
              <canvas id="sales-chart-canvas" height="375" style="height: 300px; display: block; width: 676px;" width="845" class="chartjs-render-monitor"></canvas>
            </div> --}}
          </div>
        </div><!-- /.card-body -->
      </div>
{{-- </div>  --}}
@include('sweetalert::alert')
@endsection
