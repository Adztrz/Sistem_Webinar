@extends('layouts.main')

@section('child')
<link href="{{ asset('/assets/css/dashboard.css')}}">

<div class="container-fluid">
  <div class="row py-3">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column style="height: 800px;">
          <br> <br>
          @can('Admin')
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/dashboard/admin">
              <span data-feather="user"></span>
              User
            </a>
          </li>
          @endcan
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/event">
              <span data-feather="map"></span>
              Event
            </a>
          </li>
          @if(Gate::check('Admin') || Gate::check('PIC'))
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/pendaftar">
              <span data-feather="users"></span>
              Pendaftar
            </a>
          </li>
          @endif
          <li class=""> <br> <br> <br> <br> <br> <br> <br> <br>
           <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
           <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     <br> <br>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Halo, {{ Auth::user()->name }}</h1>
      </div>
    </main>
  </div>
</div>

<script type="text/javascript" src="{{ asset('/js/dashboard.js') }}"></script>

@endsection