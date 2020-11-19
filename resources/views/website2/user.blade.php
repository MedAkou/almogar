@extends('website/layout')
@section('title')
{{ __('Login & Register') }}
@endsection

@section('content')


<div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="title mb-2">{{ __('Login') }}</h2>

                <form action="{{ route('auth-user',['store' => $store]) }}" method="POST" class="mb-1">

                    
                    @csrf
                    @include('website/elements/alerts')

                    <label for="login-email">{{ __('Email address') }} <span class="required">*</span></label>
                    <input type="email"  value="{{ old('username') }}" name="username" class="form-input form-wide mb-2" id="login-email" required="">

                    <label for="login-password">{{ __('Password') }} <span class="required">*</span></label>
                    <input type="password" name="password" class="form-input form-wide mb-2" id="login-password" required="">

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-md">{{ __('LOGIN') }}</button>
                    </div>
                    <div>
                       <a href="{{ route('forgot',['store' => $store]) }}"> <b>{{ __('Forgot Password') }}</b></a>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <h2 class="title mb-2">{{ __('Register') }}</h2>

                <form action="{{ route('registration',['store' => $store]) }}" method="POST" >
                    @csrf
                	 <label for="register-email">{{ __('Name') }} <span class="required">*</span></label>
                    <input value="{{ old('name') }}" type="text" name='name' class="form-input form-wide mb-2" id="name" >
                    <label for="register-email">{{ __('Email address') }} <span class="required">*</span></label>
                    <input type="email" name='email' class="form-input form-wide mb-2" id="register-email" >

                    <label for="register-password">{{ __('Password') }} <span class="required">*</span></label>
                    <input type="password" name="password" class="form-input form-wide mb-2" id="register-password" >

                    <label for="register-password">{{ __('Repeat Password') }} <span class="required">*</span>    <span id='message'></span></label>
                    <input type="password" name="confirm_password" class="form-input form-wide mb-2" id="confirm_password" >

                    <label for="register-email"> {{ __('Phone') }} <span class="required">*</span></label>
                    <input value="{{ old('phone') }}" type="text" name="phone" class="form-input form-wide mb-2" id="phone" >
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-md">{{ __('Register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script >
    $('#password, #confirm_password').on('keyup change', function () {
      if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
      } else 
        $('#message').html('Not Matching').css('color', 'red');
    });
</script>


@endsection


