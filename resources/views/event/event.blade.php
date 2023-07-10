@extends('layouts.main')
    
  @section('child')
    
  <section id="events">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Our Event</h2>
        <p>Here are some of our events</p>
        @if(Gate::check('Admin') || Gate::check('PIC'))
        <a href="event/create" class="btn btn-danger btn-sm" style="float: right;">Tambah Event</a>
        @endif
      </div>
      <div class="row">
        @foreach ($events as $data)  
        <div class="col-lg-4 col-md-6">
          <div class="event" data-aos="fade-up" data-aos-delay="100">
            <img src="{{asset('storage/'.$data->poster)}}" alt="event 1" class="img-fluid">
            <div class="details">
              <h3><a href="{{ url('event/'.$data->id)}}">{{ $data->nama }}</a></h3>
              <p>{{ $data->kategoriEvent }}</p>
              <div class="social">
                <h4>{{ $data->harga }}</h4>
              </div>
              @if(Gate::check('Admin') || Gate::check('PIC'))
              <div class="buttons mt-auto">
                <form class="d-inline" action="{{url('event/'.$data->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" name="submit" class="btn btn-danger btn-sm" style="width: 100%;" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                    Delete
                  </button>
                </form>
                <a href="{{url('event/'.$data->id.'/edit')}}" type="text" type="button" class="btn btn-success btn-sm mt-2" style="width: 100%;">
                  Edit
                </a>
              </div>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  
    <!-- End Event Section -->
        
  </main>

@endsection 