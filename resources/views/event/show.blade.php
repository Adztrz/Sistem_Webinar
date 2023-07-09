@extends('layouts.main')
  @include('partials.navbar')
    
  @section('child')
    
    <!-- ======= Event Section ======= -->
    <section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="{{asset('storage/'.$data->poster)}}" style="width: 400px;">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded" style="margin-bottom: 1rem;">
                                    <h2 style="width: 100%;" class="h2 text-white mb-0">{{ $data->eventName }}</h2>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-m-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Harga Tiket Masuk: </span> {{ $data->isPaid }}</li>
                                    <li class="mb-2 mb-m-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Jenis Kegiatan: </span> {{ $data->kategoriEvent }}</li>
                                    <li class="mb-2 mb-m-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Tanggal Acara: </span> {{ $data->eventDate }}</li>
                                    <li class="mb-2 mb-m-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Lokasi: </span><a href="{{ $data->eventLocation }}" a>{{ $data->eventLocation }}</a></li>
                                </ul>
                                <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                    <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div>
                    <span class="section-title text-primary mb-3 mb-sm-4">Informasi Tambahan</span>
                    <p style="text-align: justify;">{{ $data->kategoriEvent }} {{ $data->eventName }} akan membuka pendaftaran mulai dari tanggal {{ $data->regisStartDate }} dan menutup pendaftaran pada tanggal {{ $data->regisEndDate }}. Kegiatan ini diadakan di <a href="{{ $data->eventName }}">{{ $data->eventLocation }} </a> Pada tanggal {{ $data->eventDate }}. Peserta akan yang mengikuti acara {{ $data->kategoriEvent }} ini akan mendapatkan E-Sertifikat yang dapat diunduh mulai dari tanggal {{ $data->certificateStartDate }}. Anda dapat mendaftar seminar melalui link dibawah.</p>
                    <p class="mb-0">Daftar dengan klik <a href="">Daftar Sekarang!!!</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
    </section>
    <!-- End Event Section -->
        
  </main>
  <!-- End #main -->
@endsection