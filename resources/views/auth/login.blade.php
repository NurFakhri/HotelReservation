@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100 my-auto">
      <div class="col-md-9 col-lg-6 col-xl-5 text-center mb-5" style="margin-top: 100px;"> <!-- Menambahkan margin bottom yang lebih besar pada gambar -->
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5" style="margin-top: 150px;"> <!-- Menambahkan margin top yang lebih besar pada formulir -->
        <form method="POST" action="{{ route('login') }}" style="font-size: medium;">
          @csrf
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" value="{{ old('email') }}" required autofocus />
            <label class="form-label" for="email">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required />
            <label class="form-label" for="password">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
              <label class="form-check-label" for="remember">
                Remember me
              </label>
            </div>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}" class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
@endsection