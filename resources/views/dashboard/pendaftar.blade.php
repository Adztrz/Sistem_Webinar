@extends('layouts.main')

@section('child')
<div class="container-fluid mt-5" style="margin-bottom: 250px;">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column" style="height: 800px;">
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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-bottom: 250px; margin-top: 50px;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard Pendaftar</h1>
      </div>
      <h4>Hai, {{ Auth::user()->role }} {{ Auth::user()->name }}</h4>
      <div class="table-responsive">
        <table class="table table-striped table-sm align-middle table-hover">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Id Pendaftaran</th>
              <th scope="col">Pendaftar</th>
              <th scope="col">Event</th>
              <th scope="col">No. Telepon</th>
              <th scope="col">Status</th>
              <th scope="col">Ubah Status</th>
              <th scope="col">Sumber Info</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($regist as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->id }}</td>
                <td>
                    @foreach ($user as $data2)
                        @if ($data->user_id == $data2->id)
                            {{ $data2->name }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($ngevent as $data3)
                        @if ($data->event_id == $data3->id)
                            {{ $data3->nama }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $data->no_telp }}</td>
                <td>{{ $data->status }}</td>
                <td>
                    <form action="{{ url('/dashboard/pendaftar/'.$data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <select class="form-select" name="status" id="status">
                                    <option value="Peserta" {{ $data->status == 'Peserta' ? 'selected' : '' }}>Peserta</option>
                                    <option value="Outstanding" {{ $data->status == 'Outstanding' ? 'selected' : '' }}>Outstanding</option>
                                    <option value="Pembicara" {{ $data->status == 'Pembicara' ? 'selected' : '' }}>Pembicara</option>
                                </select>
                            </div>
                        </div>
                        
                    </form>
                </td>
                <td>{{ $data->sumberInfo }}</td>
                <td>
                  <td>
                    <button type="submit" name="aksi" value="edit" class="btn btn-success" onClick="return confirm('Apakah anda yakin ingin mengubah statusnya?')">
                      <i class="fa fa-check" aria-hidden="true"></i>
                      Confirm
                  </button>
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
