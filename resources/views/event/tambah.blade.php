@extends('layouts.main')
  @include('partials.navbar')
    
  @section('child')
    <!-- ======= Event Section ======= -->
 
    <section id="events">
      <div class="container" data-aos="fade-up">
        <div class="section-header" style="margin-top:60px;">
          <h2>Add Event</h2>
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
          <form method="POST" action="{{url ('event')}}" enctype="multipart/form-data"> 
            @csrf
            <div class="mb-3 row">
              <label for="name" class="col-sm-1 col-form-label">
                Name
            </label>
              <div class="col-sm-10">	
                <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Masa Depan AI">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="category" class="col-sm-1 col-form-label">
                Category
            </label>
              <div class="col-sm-10">	
                <select class="form-select" name="category" id="category">
                  <option selected value = "">Choose Category</option>
                  <option value="Seminar">Seminar</option>
                  <option value="Webinar">Webinar</option>
                </select>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="evd" class="col-sm-1 col-form-label">
                Date
            </label>
              <div class="col-sm-10">	
                <input type="text" name="evd" class="form-control" id="evd" placeholder="Contoh: 2023-07-10">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="lokasi" class="col-sm-1 col-form-label">
                Lokasi
            </label>
              <div class="col-sm-10">	
                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Contoh: Gedung Budi Sasono, Contoh Lain: Zoom">
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="loc" class="col-sm-1 col-form-label">
                Event Link
            </label>
              <div class="col-sm-10">	
                <input type="text" name="loc" class="form-control" id="loc" placeholder="Contoh: https://goo.gl/maps/XpoK3FEBoxztJoS96">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="pait" class="col-sm-1 col-form-label">
                Berbayar
            </label>
              <div class="col-sm-10">	
                <select class="form-select" name="pait" id="pait">
                  <option selected value='0'>Gratis</option>
                  <option value='1'>Berbayar</option>
                </select>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="price" class="col-sm-1 col-form-label">
                Price
            </label>
              <div class="col-sm-10">	
                <input type="text" name="price" class="form-control" id="price" placeholder="Contoh: Free, Contoh Lain: Rp60.000">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="regsd" class="col-sm-1 col-form-label">
                Registration Start Date
            </label>
              <div class="col-sm-10">	
                <input type="text" name="regsd" class="form-control" id="regsd" placeholder="Contoh: 2023-06-20">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="reged" class="col-sm-1 col-form-label">
                Registration End Date
            </label>
              <div class="col-sm-10">	
                <input type="text" name="reged" class="form-control" id="reged" placeholder="Contoh: 2023-06-30">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="csd" class="col-sm-1 col-form-label">
                Certificate Start Date
            </label>
              <div class="col-sm-10">	
                <input type="text" name="csd" class="form-control" id="csd" placeholder="Contoh: 2023-07-15">
              </div>
            </div> 

            <div class="mb-3 row">
              <label for="ct" class="col-sm-1 col-form-label">
                Certificate Template
            </label>
              <div class="col-sm-10">	
                <input name="ct" class="form-control" type="file" id="ct">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="pst" class="col-sm-1 col-form-label">
                Poster
            </label>
              <div class="col-sm-10">	
                <input name="pst" class="form-control" type="file" id="pst">
              </div>
            </div>

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