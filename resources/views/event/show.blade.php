@extends('layouts.main')
    
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
                                    <h2 style="width: 100%;" class="h2 text-white mb-0">{{ $data->nama }}</h2>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-md-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Pembicara:</span>
                                        {{ $data->tanggal }}
                                      </li>
                                      <li class="mb-2 mb-md-3 display-28">
                                    <li class="mb-2 mb-md-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Harga Tiket Masuk:</span>
                                        Rp. {{ $data->harga }}
                                      </li>
                                      <li class="mb-2 mb-md-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Jenis Kegiatan:</span>
                                        {{ $data->kategoriEvent }}
                                      </li>
                                      <li class="mb-2 mb-md-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Tanggal Acara:</span>
                                        {{ $data->tanggal }}
                                      </li>
                                      <li class="mb-2 mb-md-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Ditutup dalam:</span>
                                        {{ Carbon\Carbon::parse($data->tanggal)->diffInDays(\Carbon\Carbon::now()) }} Hari Lagi
                                      </li>
                                      <li class="mb-2 mb-md-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Lokasi:</span>
                                        <a href="{{ $data->link }}">{{ $data->lokasi }}</a>
                                      </li>
                                      <li class="mb-2 mb-md-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Unduh Sertifikat:</span>
                                        @if($registration = \App\Models\Registration::where('user_id', Auth::user()->id)->where('event_id', $data->id)->first() != NULL)
                                        @php
                                            $registration = \App\Models\Registration::where('user_id', Auth::user()->id)
                                                ->where('event_id', $data->id)
                                                ->first();

                                            $diffInDays = Carbon\Carbon::parse($data->tanggalsertif)->diffInDays(\Carbon\Carbon::now());
                                            $certificateLink = $diffInDays >= 0 ? asset('storage/app/public/certificate_template/' . $registration->user_id . '/' . $data->certificate_template) : '';
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
                                        @endif
                                    </li>
                                    
                                      <form method="POST" action="{{ url('/event/daftar') }}">
                                        @csrf
                                        <div class="mb-3 row">
                                            <div class="col-sm-10">
                                                <input hidden type="text" name="idevent" class="form-control" id="idevent" value="{{ $data->id }}">
                                            </div>
                                        </div>
                                        @if ($data->registrations()->where('user_id', Auth::user()->id)->exists())
                                            <button type="submit" name="aksi" value="daftar" class="btn btn-danger" hidden>
                                                Daftar
                                            </button>
                                            <p class="text-muted">Anda sudah terdaftar.</p>
                                        @else
                                            <button type="submit" name="aksi" value="daftar" class="btn btn-danger">
                                                Daftar
                                            </button>
                                        @endif
                                    </form>
                                    @if (Gate::check('Admin') || Gate::check('PIC'))
                                        <button type="submit" name="aksi" value="preview" class="btn btn-danger mt-2">
                                            Preview Sertifikat
                                        </button>
                                    @endif
                                    </li>
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
                    <p style="text-align: justify;">
                      {{ $data->kategoriEvent }} {{ $data->nama }} akan membuka pendaftaran mulai dari tanggal {{ $data->regawal }} dan menutup pendaftaran pada tanggal {{ $data->regakhir }}.
                      Kegiatan ini diadakan di <a href="{{ $data->link }}">{{ $data->lokasi }}</a> pada tanggal {{ $data->tanggal }}.
                      Peserta yang mengikuti acara {{ $data->kategoriEvent }} ini akan mendapatkan E-Sertifikat yang dapat diunduh mulai dari tanggal {{ $data->tanggalsertif }}.
                    </p>
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