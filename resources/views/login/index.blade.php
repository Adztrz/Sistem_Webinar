@extends('layouts.main')

@indclude('partials')

@section('child')


<main class="form-signin mt-10 " style="margin-bottom: 300px; margin-top: 200px; max-width: 400px; margin-left: auto; margin-right: auto;"">
    
    <div class="form-container sign-up-container">
		@if(session()->has('succes'))
	<div clas ="alert alert-succes alert-dismissible fade show" role="alert">
		{{ session('succes') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		@endif
    
    <form action="/login" method="POST">
    @csrf
        <h1 class="h3 mb-4 fw-normal text-center">Login</h1>

        <div class="form-floating mb-3">
            <input type="email" name="email" id="email" class="form-control form-control-sm" id="floatingInput" placeholder="Email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" id="password" class="form-control form-control-sm" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
    
        <div class="checkbox mb-3">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    </form>
    <small class="d-block text-center mt-3">Tidak Punya Account? <a href="/register" style="color: blue;">Register!</a>

  </main>

  @endsection