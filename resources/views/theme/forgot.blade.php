@extends(\System::$ACTIVE_THEME_PATH.'/layout')
@section('title')
{{ __('Forgot Password') }}
@endsection

@section('content')


 <main class="main">

            <div class="ps-breadcrumb">
              <div class="container">
                 <ul class="breadcrumb">
                    <li><a href="{{ route('home',['store' => $store ]) }}">Home</a></li>
                    <li>{{ __('account') }}</li>
                    <li>{{ __('Forgot Password') }}</li>
                 </ul>
              </div>
           </div>

            <div class="container">
                <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="heading mb-4">
                            <h2 class="title">{{ __('Reset Password') }}</h2>
                            <p>{{ __('Please enter your email address below to receive a password reset link.') }}</p>
                        </div><!-- End .heading -->

                        <form action="/resetpassword" method="post">
                            @csrf
                            <div class="form-group required-field">
                                <label for="reset-email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="reset-email" name="resetemail" required>
                            </div><!-- End .form-group -->

                            <div class="form-footer">
                                <button type="submit" class="btn card-button-inner bag-button">{{ __('Reset My Password') }}</button>
                            </div><!-- End .form-footer -->
                        </form>
                    </div>
                </div>
            </div><!-- End .container -->

            <div class="mb-10"></div><!-- margin -->
        </main><!-- End .main -->





@endsection