

<link href="assets/css/login.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/login.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">

<div class="container" id="container">
	
	<div class="form-container sign-up-container">
		@if(session()->has('succes'))
	<div clas ="alert alert-succes alert-dismissible fade show" role="alert">
		{{ session('succes') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		@endif
	
		<form action="/login" method="POST">
			@csrf
			<h1>Membuat Akun</h1>
			<input type="text" name="name" id="name" placeholder="Name"/>			
			<input type="email" name="email" id="email" placeholder="Email" />
			<input type="password" name="password" id="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="/login" method="POST">
			@csrf
			<h1>Sign in</h1>
			<input type="email" name="email" id="email" placeholder="name@example.com" autofocus required />
			<input type="password" name="password" id="password" placeholder="Password" required />
			<a href="#">Lupa Password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Selamat Datang!</h1>
				<p>Jika sudah memiliki akun, silahkan login</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Buat Akun</h1>
				<p>Jika belum memiliki akun, silahkan buat dahulu</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/login.js"></script>  
<script type="text/javascript" src="{{ asset('/js/login.js') }}"></script>

