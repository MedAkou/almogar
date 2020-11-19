@extends('website/layout')
@section('title')
{{ __('Forgot Password') }}
@endsection

@section('content')


 <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Forgot Password') }}</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="heading mb-4">
                    <h2 class="title">{{ __('Reset Password') }}</h2>
                    <p>{{ __('Please enter your email address below to receive a password reset link.') }}</p>
                </div><!-- End .heading -->

                <form action="{{ route('password.validate',['store' => $store]) }}" method="post">
                    @csrf
                    <div class="form-group required-field">
                        <label for="reset-email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="reset-email" name="resetemail" required>
                    </div><!-- End .form-group -->

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Reset My Password') }}</button>
                    </div><!-- End .form-footer -->
                </form>
            </div><!-- End .container -->

            <div class="mb-10"></div><!-- margin -->
        </main><!-- End .main -->





@endsection