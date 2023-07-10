<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>THE EVENT</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="{{asset('assets/vendor/fontawesome/css/font-awesome.min.css')}}">
    
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">THE EVENT</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form class="form-control form-control-dark w-90 my-1"   action="{{url('user')}}" method="get">
    <input class="form-control form-control-dark w-90" type="search" name="katakunci" value="{{Request::get('katakunci')}}" placeholder="Search" aria-label="Search">
  </form>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      @auth
      <form action="/sign-out" method="post">
        @csrf
        <button class="nav-link px-4" style="background-color: #212529;" type="submit" >Sign Out</button>
      </form>
      @else
      <form action="/sign-in">
        <button class="nav-link px-4" style="background-color: #212529;" type="submit" >Sign In</button>
      </form>
      @endauth
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/dashboard/admin">
              <span data-feather="user"></span>
              User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/siswa">
              <span data-feather="users"></span>
              Event
            </a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Staff
            </a>
          </li>
          -->
        </ul>
        <!--
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
        -->
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard User</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <h4>Hai, {{Auth::user()->role}} {{ Auth::user()->name }}</h4>
      <div class="table-responsive">
        <table class="table table-striped table-sm align-middle table-hover">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Change Role</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->role }}</td>
                
                <td>
                    <form action="{{url ('/dashboard/admin'.$data->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        @if($data->role=='Admin')
                            <div class="mb-3 row">
                                <div class="col-sm-10">	
                                    <select class="form-select" name="role" id="role">
                                    <option selected value = "Admin">Admin</option>
                                    <option value="PIC">PIC</option>
                                    <option value="User">User</option>
                                    </select>
                                </div>
                            </div>
                        @elseif($data->role=='Operator')
                            <div class="mb-3 row">
                                <div class="col-sm-10">	
                                    <select class="form-select" name="role" id="role">
                                    <option value = "Admin">Admin</option>
                                    <option selected value="PIC">PIC</option>
                                    <option value="User">User</option>
                                    </select>
                                </div>
                            </div>
                        @elseif($data->role=="User")
                            <div class="mb-3 row">
                                <div class="col-sm-10">	
                                    <select class="form-select" name="role" id="role">
                                    <option value = "Admin">Admin</option>
                                    <option value="PIC">PIC</option>
                                    <option selected value="User">User</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        <button type="submit" name="aksi" value="edit" class="btn btn-success" onClick="return confirm('Apakah anda yakin ingin mengubah role milik {{ $data->name }}?')">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Confirm
                        </button>
                    </form>
                </td>
                <td>
                  <form class="d-inline" action="{{url('user/'.$data->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="submit" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                      <i class="fa fa-trash"> </i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $user->withQueryString()->links()}}
      </div>
    </main>
  </div>
</div>


    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="{{asset('assets/bootstrap/dashboard.js')}}"></script>
  </body>
</html>
