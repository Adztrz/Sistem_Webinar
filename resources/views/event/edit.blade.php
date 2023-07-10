<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TheEvent</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon2.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style-detail.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/style-detail.css') }}">

  <!-- =======================================================
  * Template Name: TheEvent
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <a href="/" class="scrollto"><img src="{{ asset('assets/img/logo.png')}}" alt="" title=""></a>
      </div>
  
      <nav id="navbar" class="navbar order-last order-lg-0">
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a class="buy-tickets scrollto" href="/login">Login</a>

    </div>
  </header><!-- End Header -->
  <main id="main">
    
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
          <form action="{{url ('event/'.$data->id)}}" method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
            <div class="mb-3 row">
              <label for="name" class="col-sm-1 col-form-label">
                Name
            </label>
              <div class="col-sm-10">	
                <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Masa Depan AI" value="{{$data->nama}}">
              </div>
            </div>

            @if($data->kategoriEvent=='Seminar')
            <div class="mb-3 row">
              <label for="category" class="col-sm-1 col-form-label">
                Category
            </label>
              <div class="col-sm-10">	
                <select class="form-select" name="category" id="category">
                  <option value = "">Choose Category</option>
                  <option selected value="Seminar">Seminar</option>
                  <option value="Webinar">Webinar</option>
                </select>
              </div>
            </div>
          
          @elseif($data->kategoriEvent=='Webinar')
            <div class="mb-3 row">
              <label for="category" class="col-sm-1 col-form-label">
                Category
            </label>
              <div class="col-sm-10">	
                <select class="form-select" name="category" id="category">
                  <option value = "">Choose Category</option>
                  <option value="Seminar">Seminar</option>
                  <option selected value="Webinar">Webinar</option>
                </select>
              </div>
            </div>
            @endif

            <div class="mb-3 row">
              <label for="evd" class="col-sm-1 col-form-label">
                Date
            </label>
              <div class="col-sm-10">	
                <input type="text" name="evd" class="form-control" id="evd" placeholder="Contoh: 2023-07-10" value="{{$data->tanggal}}">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="lokasi" class="col-sm-1 col-form-label">
                Lokasi
            </label>
              <div class="col-sm-10">	
                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Contoh: Gedung Budi Sasono, Contoh Lain: Zoom" value="{{$data->lokasi}}">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="loc" class="col-sm-1 col-form-label">
                Event Link
            </label>
              <div class="col-sm-10">	
                <input type="text" name="loc" class="form-control" id="loc" placeholder="Contoh: Gedung Budi Sasono" value="{{$data->link}}">
              </div>
            </div>

            @if($data->isPaid=='0')
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
            @elseif($data->isPaid=='1')
            <div class="mb-3 row">
              <label for="pait" class="col-sm-1 col-form-label">
                Berbayar
            </label>
              <div class="col-sm-10">	
                <select class="form-select" name="pait" id="pait">
                  <option value='0'>Gratis</option>
                  <option selected value='1'>Berbayar</option>
                </select>
              </div>
            </div>
            @endif

            <div class="mb-3 row">
              <label for="price" class="col-sm-1 col-form-label">
                Price
            </label>
              <div class="col-sm-10">	
                <input type="text" name="price" class="form-control" id="price" placeholder="Contoh: Free, Contoh Lain: Rp60.000" value="{{$data->harga}}">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="regsd" class="col-sm-1 col-form-label">
                Registration Start Date
            </label>
              <div class="col-sm-10">	
                <input type="text" name="regsd" class="form-control" id="regsd" placeholder="Contoh: 2023-06-20" value="{{$data->regawal}}">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="reged" class="col-sm-1 col-form-label">
                Registration End Date
            </label>
              <div class="col-sm-10">	
                <input type="text" name="reged" class="form-control" id="reged" placeholder="Contoh: 2023-06-30" value="{{$data->regakhir}}">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="csd" class="col-sm-1 col-form-label">
                Certificate Start Date
            </label>
              <div class="col-sm-10">	
                <input type="text" name="csd" class="form-control" id="csd" placeholder="Contoh: 2023-07-15" value="{{$data->tanggalsertif}}">
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
                  <button type="submit" name="aksi" value="add" class="btn btn-success">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Edit
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

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="{{ asset('assets/img/logo.png')}}" alt="TheEvenet">
            <p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>
  <script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>

  
</body>

</html>