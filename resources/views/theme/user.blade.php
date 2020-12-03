@extends(\System::$ACTIVE_THEME_PATH.'/layout')
@section('title')
{{ __('Login & Register') }}
@endsection
<style>
   .ps-form__footer p, .ps-form__footer ul li {
    display: none;
}
</style>
@section('content')


<div class="ps-page--my-account">
   <div class="ps-my-account">
      <div class="container">
         <div class="ps-form--account ps-tab-root">
            <ul class="ps-tab-list">
               <li class="active"><a href="#sign-in">{{ __('Login') }}</a></li>
               <li class=""><a href="#register">{{ __('Register') }}</a></li>
            </ul>
            <div class="ps-tabs">
               <div class="ps-tab active" id="sign-in">
                  <form class="" action="{{ route('auth-user',['store' => $store]) }}" method="post">
                     @csrf
                     
                     <div class="ps-form__content">
                     <h5>{{ __('please insert login info') }}</h5>
                        <div class="form-group">
                           <input type="email" placeholder="{{ __('Email address') }}"  value="{{ old('username') }}" name="username" class="form-control" id="login-email" required="">
                        </div>
                        <div class="form-group form-forgot">
                           <input type="password" placeholder="{{ __('Password') }}" name="password" class="form-control" id="login-password" required=""><a href="{{ route('forgot',['store' => $store]) }}">{{ __('Forgot Password') }}</a>
                        </div>
                        <div class="form-group">
                           <div class="ps-checkbox">
                              <input class="form-control" type="checkbox" id="remember-me" name="remember-me">
                           <label for="remember-me">{{ __('Remember me') }}</label>
                           </div>
                        </div>
                        <div class="form-group submtit">
                           <button type="submit" class="ps-btn ps-btn--fullwidth">{{ __('LOGIN') }}</button>
                        </div>
                     </div>
                     <div class="ps-form__footer">
                        <p>Connect with:</p>
                        <ul class="ps-list--social">
                           <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                           <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                     </div>
                  </form>
               </div>
               <div class="ps-tab" id="register">
                  <form class="" action="{{ route('registration',['store' => $store]) }}" method="post">
                     @csrf
                     <div class="ps-form__content">
                        <h5>{{ __('Register account') }}</h5>
                        <div class="form-group">
                           <input placeholder="{{ __('Name') }}" value="{{ old('name') }}" type="text" name='name' class="form-control" id="name" required/>
                        </div>
                        <div class="form-group">
                           <input placeholder="{{ __('Email address') }}" type="email" name='email' class="form-control" id="register-email" required/>
                        </div>
                        <div class="form-group">
                           <input placeholder="{{ __('Password') }}" type="password" name="password" class="form-control" id="register-password" required/>
                        </div>
                        <div class="form-group">
<<<<<<< HEAD:resources/views/theme/user.blade.php
                           <input type="password" placeholder="{{ __('Confirm Password') }} " name="password_confirmation" class="form-control" id="password_confirmation" required/>
=======
                           <input type="password" placeholder="{{ __('Confirm Password') }} " name="confirm_password" class="form-control" id="confirm_password" required/>
>>>>>>> 607512cea1f2e040d12d5d02f20bc9488db88380:resources/views/theme2/user.blade.php
                        </div>
                        <div class="form-group">
                           <input placeholder="{{ __('Phone') }}" value="{{ old('phone') }}" type="text" name="phone" class="form-control" id="phone" required/>
                        </div>
                        <div class="form-group submtit">
                           <button type="submit" class="ps-btn ps-btn--fullwidth">{{ __('Register') }}</button>
                        </div>
                     </div>
                     <div class="ps-form__footer">
                        <p>Connect with:</p>
                        <ul class="ps-list--social">
                           <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                           <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection