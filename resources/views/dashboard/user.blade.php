@extends('layouts.main')

@section('child')

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <br> <br> <br> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/dashboard/admin">
              <span data-feather="user"></span>
              User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/event">
              <span data-feather="users"></span>
              Event
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/dashboard/pendaftar">
              <span data-feather="users"></span>
              Pendaftar
            </a>
          </li>
          <li class=""> <br> <br> <br> <br> <br> <br> <br> <br>
           <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
           <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <br> <br> <br> 
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard User</h1>
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
                    <form action="{{url ('/dashboard/admin/'.$data->id)}}" method="POST">
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
                        @elseif($data->role=='PIC')
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
                  <form class="d-inline" action="{{url('dashboard/admin/'.$data->id)}}" method="POST">
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
      </div>
    </main>
  </div>
</div>
@endsection
