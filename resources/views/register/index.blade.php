@extends('layouts.main')

@indclude('partials.navbar')

@section('child')


<main class="form-signin mt-10 " style="margin-bottom: 300px; margin-top: 200px; max-width: 400px; margin-left: auto; margin-right: auto;"">
    
    <div class="form-container sign-up-container">
		@if(session()->has('succes'))
	<div clas ="alert alert-succes alert-dismissible fade show" role="alert">
		{{ session('succes') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		@endif
    
        <h1 class="h3 mb-4 fw-normal text-center">Registration Form</h1>

        <form action="/register" method="POST">
            @csrf

        <div class="form-floating mb-3">
            <input type="text" name="name" id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Name">
            <label for="floatingInput">Name</label>
            @error ('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email">
            <label for="floatingInput">Email address</label>
            @error ('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" id="password" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error ('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    
        <div class="checkbox mb-3">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    </form>
    <small class="d-block text-center mt-3">Sudah Punya Account? <a href="/login" style="color: blue;">Login!</a>

  </main>

  @endsection