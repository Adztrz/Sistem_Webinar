@extends('layouts.main')

@section('child')
<div class="container-fluid mt-5" style="margin-bottom: 250px;">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse margin-top: auto;">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
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
              <span data-feather="users"></span>
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
        <h1 class="h2">Dashboard Event</h1>
      </div>
      <h4>Hai, {{ Auth::user()->role }} {{ Auth::user()->name }}</h4>
      <div class="table-responsive">
        <table class="table table-striped table-sm align-middle table-hover">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Jenis Event</th>
              <th scope="col">Unduh Sertifikat</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($events as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->nama }}</td>
              <td>{{ $data->tanggal }}</td>
              <td>{{ $data->lokasi }}</td>
              <td>{{ $data->kategoriEvent }}</td>
              <td>
                @php
                $registration = \App\Models\Registration::where('user_id', Auth::user()->id)
                  ->where('event_id', $data->id)
                  ->first();

                $diffInDays = Carbon\Carbon::parse($data->tanggalsertif)->diffInDays(\Carbon\Carbon::now());
                $certificateLink = $diffInDays <= 0 ? asset('storage/app/public/certificate_template/' . $registration->user_id . '/' . $data->certificate_template) : '';
                $extension = pathinfo($data->certificate_template, PATHINFO_EXTENSION);
                @endphp
                @if ($diffInDays < 0)
                Dalam {{ $diffInDays }} Hari
                @else
                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                <img src="{{ $certificateLink }}" alt="Certificate Preview" style="max-width: 100%; height: auto;">
                @elseif (in_array($extension, ['pdf']))
                <embed src="{{ $certificateLink }}" type="application/pdf" width="100%" height="600px">
                @else
                <a href="{{ $certificateLink }}" download>Sertifikat</a>
                @endif
                @endif
              </td>
              <td>
                <form action="{{ url('event/'.$data->id) }}" method="GET">
                  <button type="submit" class="btn btn-primary">Detail</button>
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
