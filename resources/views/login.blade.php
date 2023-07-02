<link href="assets/css/login.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/login.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">

<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalForm">
    Launch Modal Form
  </button>
<div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="myform bg-dark">
                <h1 class="text-center">Login Form</h1>
                <form>
                    <div class="mb-3 mt-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-light mt-3">LOGIN</button>
                    <p>Not a member? <a href="#">Signup now</a></p>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
















<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Membuat Akun</h1>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Sign in</h1>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
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
<footer>
</footer>