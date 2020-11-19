@extends('layouts.app')

@section('content')


<style>
    body {
    background-image: linear-gradient(135deg, #52E5E7 5%, #130CB7 100%);
}

.login-form {
    border: 0;
    box-shadow: 0.75rem 0.75rem 1.75rem 0 rgba(0, 0, 0, 0.25);
}

input#email {
    height: 50px;
}

input#password {
    height: 50px;
}

.has-feedback-left .form-control {
    top: 40px !important;
}

.has-feedback-left .form-control-feedback {
    top: -9px;
}

.has-feedback-left .form-control-feedback i {
    color: #3071cd !important;
}
.login-container .login-form, .login-container .registration-form {
    margin: 0 auto 20px auto;
}
.login-container .login-form {
    width: 320px;
}

.login-container .content-wrapper {
    vertical-align: middle;
    display: table-cell;
}
.login-container .page-content {
    display: table-row;
    height: 100%;
}
.login-container {
    display: table;
    width: 100%;
    height: 100%;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
