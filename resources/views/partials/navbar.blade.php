<header id="header" class="d-flex align-items-center ">
  <div class="container-fluid container-xxl d-flex align-items-center">
    <div id="logo" class="me-auto">
      <a href="/" class="scrollto"><img src="assets/img/logo.png" alt="" title=""></a>
    </div>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        @auth
        <li><a class="nav-link scrollto" href="home#hero">Home</a></li>
        <li><a class="nav-link" href="/event">Events</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome Back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Gate::check('Admin') || Gate::check('PIC'))
            <li><a class="nav-link scrollto" href="/dashboard">Dashboard</a></li>
            @endif
            @if(Gate::check('User'))
            <li><a class="nav-link scrollto" href="/dashboard/event">Dashboard</a></li>
            @endif
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @else
        <li><a class="nav-link scrollto" href="home#hero">Home</a></li>
        <li><a class="nav-link" href="/event">Events</a></li>
        <li><a class="nav-link scrollto" href="home#speakers">Speakers</a></li>
        <li><a class="nav-link scrollto" href="home#schedule">Schedule</a></li>
        <li><a class="nav-link scrollto" href="home#supporters">Sponsors</a></li>
        <li><a class="nav-link scrollto" href="home#faq">FAQ</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    <a class="buy-tickets scrollto" href="/login">Login</a>
    @endauth

  </div>
</header><!-- End Header -->
