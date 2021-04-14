<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('layouts.back.style')
  @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-dark bg-success">
    <div class="container-fluid">
      <ul class="nav navbar-nav pull-sm-left">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-logo mx-auto">
        <li class="nav-item">
          <img src="{{ asset('logo/esawah-text.png') }}" alt="Logo" style="width:150px">
        </li>
      </ul>
      <ul class="nav navbar-nav pull-sm-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fas fa-user fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Login As
            @can('isAdmin')
                <span class="badge badge-primary">Admin</span>
            @elsecan('isPro')
                <span class="badge badge-info">Pro</span>
            @elsecan('isFree')
                <span class="badge badge-warning">Free</span>
            @endcan
            User
            </span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-user fa-fw mr-2"></i> My Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >Sign Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="d-none">
            @csrf
            </form>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-success elevation-2">
      <img src="{{ asset('logo/es-mini.png') }}" alt="Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-bold">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('back/dist/img/usericon.svg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
        @include('layouts.back.sidebar')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $headmenu ?? false }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            {!!$navigator ?? false!!}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      {{ myapp()['version'] }}
    </div>
    {!! myapp()['copyright'] !!}
  </footer>
</div>
<!-- ./wrapper -->
  @include('layouts.back.script')
  @stack('scripts')
</body>
</html>
