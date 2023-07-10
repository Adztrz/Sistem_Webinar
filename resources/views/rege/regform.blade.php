@extends('layouts.main')
  @include('partials.navbar')
    
  @section('child')
    <!-- ======= Event Section ======= -->
 
    <section id="events">
      <div class="container" data-aos="fade-up">
        <div class="section-header" style="margin-top:60px;">
          <h2>Daftar {{ $event->kategoriEvent }} {{ $event->nama }}</h2>
          <p>Please input the detail</p>
        </div>
        @if ($errors->any())
        <div class="pt-3">
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $erorbang)
                  <li>{{$erorbang}}</li>
              @endforeach
            <ul>
          </div>
        </div>
        @endif
          <form method="POST" action="{{url ('/event/daftar-event') }}" enctype="multipart/form-data"> 
            @csrf
            <div class="mb-3 row">
              <label hidden for="idevent" class="col-sm-1 col-form-label">
                Id event
            </label>
              <div class="col-sm-10">	
                <input hidden type="text" name="idevent" class="form-control" id="idevent" value="{{$data->idevent}}">
              </div>
            </div>

            <div class="mb-3 row">
              <label hidden for="uid" class="col-sm-1 col-form-label">
                User Id
            </label>
              <div class="col-sm-10">	
                <input hidden type="text" name="uid" class="form-control" id="uid" value="{{Auth::user()->id}}">
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="telp" class="col-sm-1 col-form-label">
                Nomor Telepon
            </label>
              <div class="col-sm-10">	
                <input type="text" name="telp" class="form-control" id="telp" placeholder="081212341234">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="scam" class="col-sm-1 col-form-label">
                Nomor Identitas
            </label>
              <div class="col-sm-10">	
                <input type="text" name="scam" class="form-control" id="scam" placeholder="2103102301230210">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="info" class="col-sm-1 col-form-label">
                Sumber Informasi
            </label>
              <div class="col-sm-10">	
                <input type="text" name="info" class="form-control" id="info" placeholder="Instagram">
              </div>
            </div>

            @if($event->isPaid=='1')
              <div class="mb-3 row">
              <label for="pay" class="col-sm-1 col-form-label">
                Bukti Pembayaran
            </label>
              <div class="col-sm-10">	
                <input name="pay" class="form-control" type="file" id="pay">
              </div>
            </div>
            @endif

            <div class="mb-3 row">
              <div class="col">
                  <button type="submit" name="aksi" value="add" class="btn btn-primary">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Add
                  </button>
                <a href="/event" type="button" class="btn btn-danger">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Cancel
                </a>
              </div>
            </div>
          </form>

        </div>
      </div>

    </section>
    <!-- End Event Section -->
        
  </main>
  <!-- End #main -->
@endsection