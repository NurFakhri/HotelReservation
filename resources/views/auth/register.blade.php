@extends('layouts.app')

@section('title', 'Register')

@section('content')
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100 my-auto">
      <div class="col-md-9 col-lg-6 col-xl-5 text-center mb-5" style="margin-top: 100px;">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5" style="margin-top: 150px;">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <!-- Nama -->
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right mb-3">{{ __('Name') }}</label>

            <div class="col-md-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <!-- Email -->
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right mb-3">{{ __('E-Mail') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <!-- Password -->
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right mb-3">{{ __('Password') }}</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <!-- Konfirmasi Password -->
          <div class="form-group row">
            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right mb-3">{{ __('Confirm') }}</label>

            <div class="col-md-6">
              <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>
          </div>

          <!-- Role -->
          <div class="form-group row">
            <label for="role" class="col-md-4 col-form-label text-md-right mb-3">{{ __('Role') }}</label>

            <div class="col-md-6">
              <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
              @error('role')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <!-- Tombol Registrasi -->
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
              </button>
            </div>
          </div>
        </form>

        <!-- Sudah punya akun? -->
        <div class="text-center mt-3">
          Sudah punya akun? <a href="{{ route('login') }}" class="link-primary">Login</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection