@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
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
                  <form class="" action="{{ route('account.auth-user') }}" method="post">
                     @csrf
                      
                     <div class="ps-form__content">
                        <h5>{{ __('please insert login info') }}</h5>
                        <div class="form-group">
                           <input type="email" placeholder="{{ __('Email address') }}"  value="{{ old('username') }}" name="username" class="form-control" id="login-email" required="">
                        </div>
                        <div class="form-group form-forgot">
                           <input type="password" placeholder="{{ __('Password') }}" name="password" class="form-control" id="login-password" required=""><a href="{{ route('account.forgot') }}">{{ __('Forgot Password') }}</a>
                        </div>
                        <div class="form-group">
                           <div class="ps-checkbox">
                              <input class="form-control" type="checkbox" id="remember-me" name="remember-me">
                              <label for="remember-me">{{ __('Remember Me') }}</label>
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
                  <form id="register-form"
                        data-link="{{ route('account.registration') }}"
                        method="post">
                     @csrf
                     <div class="ps-form__content">
                        <h5>{{ __('Register account') }}</h5>
                        <div class="form-group name-cont">
                           <input placeholder="{{ __('Name') }}" value="{{ old('name') }}" type="text" name='name' class="form-control" id="name" required/>
                           <p class="nameError">{{ __('Name have to be at least 3 characters') }}</p>
                        </div>
                        <div class="form-group email-cont">
                           <input placeholder="{{ __('Email address') }}" type="email" name='email' class="form-control" id="register-email" required/>
                           <p class="emailError">{{ __('Email required')  }}</p>
                           <p class="emailExistError">{{ __('Email already exist')  }}</p>
                        </div>
                        <div class="form-group password-cont">
                           <input placeholder="{{ __('Password') }}" type="password" name="password" class="form-control" id="register-password" required/>
                           <p class="passwordError">{{ __('Password have to be at least 4 characters') }}</p>
                        </div>
                        <div class="form-group">
                           <input type="password" placeholder="{{ __('Repeat Password') }} " name="password_confirmation" class="form-control" id="password_confirmation" required/>
                           <p class="passwordConfirmationError">{{ __("Passwords doesn't match") }}</p>
                        </div>
                        <div class="form-group">
                           <input placeholder="{{ __('Phone') }}" value="{{ old('phone') }}" type="tel" name="phone" class="form-control" id="phone" required/>
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