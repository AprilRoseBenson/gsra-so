<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>

    <!-- Custom fonts for this template-->
 <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>

.btn{
    background-color: #F0F6FE;
    color: black;
    cursor: pointer;
}

hr.solid {
  border-top: 3px solid #bbb;
}

</style>


@extends('layouts.app')

@section('content')
<body id= "page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">  <sup>Store Owner</sup></div>
    </a>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0"> -->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <center><img src="/img/{{ Auth::user()->Image }}" class="img-thumbnail rounded-circle border-0"><br>{{{ Auth::user()->StoreOwner}}}<br>{{ __('Owner') }}</center>
        </a>

    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <div class="sidebar-heading">
    </div>

 <!-- Nav Item - Pages Collapse Menu -->
 <li class="nav-item">
    <hr class="sidebar-divider my-0">
        <a class="nav-link collapsed" href="homepage_bm" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Dashboard</span>
        </a>
        <hr class="sidebar-divider my-0">
        <a class="nav-link collapsed" href="hof" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Reports</span>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link collapsed" href="homepage_hof" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span>
        </a>
        <hr class="sidebar-divider my-0">
    </li>
</li>
</ul>
 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column"  style="background-color: cornsilk">

  <!-- Begin Page Content -->
  <div class="container-fluid">
<!-- Main Content -->
<div id="content">
    <div class="card" style="padding-right: 32px; padding-left:32px;">
    <div class="row"><div class="col"><br></div></div>
    <div class="row">
    <div class="col-5 py-4 px-4">
    <a href="homepage_hof"class="btn btn-md btn-block shadow-
   sm p-3 mb-4 rounded"><i class="fa fa-folder"></i>Store Account Settings</a>
    <a href="hofaddexpenses" class="btn btn-md btn-block shadow-sm p-3 mb-4 rounded"><i class="fa fa-
   folder"></i>Store Password and Security</a>
   <a href="sp_password" class="btn btn-md btn-block shadow-sm p-3 mb-4 rounded"><i class="fa fa-
   folder"></i>Store Personnel Password and Security</a>
    </div>
    <div class="col">
    <div class="card" style="background-
   color: cornsilk; width: 100%;">
    <div class="row">
    <div class="col-12 py-4" style="padding-left:32px;">
    <h4>CHANGE STORE PERSONNEL PASSWORD</h4>
    </div>
    </div>
   <form method="POST" action="{{ route('sp_password.update') }}" style="padding-left:20px;">

    @csrf
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

    <div class="form-row">
    <div class="form-group col-md">
   <label for="formGrooupExampleInput">Store Email Address</label><br>
    <input type="text" class="form-
   control @error('email') is invalid @enderror" style="width:100%;"
    id="email" name="email" value="{{ $user['email'] }}">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md">
    <label for="formGrooupExampleInput">New Store Personnel Password</label><br>
    <input type="password" class="form-
   control @error('newpass') is invalid @enderror" style="width:100%;"
    id="sp_password" name="sp_password">
    </div>
    </div>
   
   <br>
   <div class="form-row">
    <div class="form-group col-md">
    <button class="btn bg-primary text-
   white btn-md btn-block shadow-sm p-3 mb-3 rounded"><i class="fa fa-
   folder"></i> Update Store Personnel Password</button>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    </div> <!-- end card-->
    </div> <!-- end content-->
  </div>
</div>


</body>





@endsection




</body>






</html>