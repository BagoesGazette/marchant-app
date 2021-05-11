@extends('layouts.auth')

@section('content')

<div class="d-flex flex-wrap align-items-stretch">
    <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
      <div class="p-4 m-3">
        <img src="{{ asset('vendors/img/merchant-logo.png') }}" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Merchant App</span></h4>
        <p class="text-muted">Before you start to the admin page, you must be logged in</p>
        <form method="POST" action="{{ route('login') }}" autocomplete="off">
          @csrf

          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <div class="d-block">
              <label for="password" class="control-label">Password</label>
            </div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group text-right">
            <button type="submit" class="btn btn-primary btn-block btn-lg btn-icon icon-right" tabindex="4">
              Login
            </button>
          </div>

        </form>

        <div class="text-center mt-5 text-small">
          Copyright &copy; Your Company. Made with 💙 by Merchant App
          <div class="mt-2">
            <a href="#">Privacy Policy</a>
            <div class="bullet"></div>
            <a href="#">Terms of Service</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{ asset('vendors/img/unsplash/login-bg.jpg') }}">
      <div class="absolute-bottom-left index-2">
        <div class="text-light p-5 pb-2">
          <div class="mb-5 pb-3">
            <h1 class="mb-2 display-4 font-weight-bold">Merchant App</h1>
            <h5 class="font-weight-normal text-muted-transparent">East Java, Indonesia</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
