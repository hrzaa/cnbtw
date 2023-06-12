@extends('layouts.auth')

@section('content')

<section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="min-height: 100vh; background-repeat: no-repeat; background-size: auto; background: linear-gradient(0deg, rgba(15, 23, 43, 0.76), rgba(15, 23, 43, 0.76)), url(/vendor/img/bg-login.jpeg);">
        <div class="container-fluid">
          <div class="row justify-content-center align-items-center d-flex-row h-100">
            <div class="col-12 col-md-8 col-lg-4 h-50 ">
              <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title mt-3 text-center primary">Login Account</h4>
                    <p class="text-center">Get started with your free account</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-12">
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control shadow bg-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control shadow bg-white rounded @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                    <i class="fas fa-eye" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="login_remember_box">
                                <input class="control control--checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label text-left" for="remember">
                                    {{ __('Remember Me') }}
                                </label>

                                @if (Route::has('password.request'))
                                    <a class="forget_password" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                            @if($errors->has('g-recaptcha-response'))
                            <span class="invalid-feedback" style="display:block">
                            <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-12 pt-3">
                            <button type="submit" class="btn btn-submit text-white btn-block shadow rounded">Login </button>
                        </div>
                        <p class="text-center">Dont Have an account?
                        <a href="{{ route('register') }}">Register Now</a>
                        </p>

                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
     </section>
@endsection
