@extends('layouts.app')
@section('title','Dashboard')
@section('content')

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Admin</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <!-- <li class="breadcrumb-item active">Admin</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="text-align: center;">
        <!-- Small boxes (Stat box) -->
         <!-- <img src="{{url('frontend/images/logo.jpg')}}" alt="" style="width: 25%;" class="rounded-circle"> -->
         <img src="https://mintbook.com/assetsNew/img/ams.gif" alt="">
        </div>
        
        <div class="container" style="text-align: center; color:blue"> 
          <h3>Welcome To Online Examination</h3>
        </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
