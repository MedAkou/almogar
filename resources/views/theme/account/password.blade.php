@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
@section('title')
{{ __('Password') }}
@endsection

@section('content')


        <main class="main">

			<div class="ps-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="icon-home"></i></a></li>
                        <li>{{ __('account') }}</li>
                        <li>{{ __('Password') }}</li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">
						@include(\System::$ACTIVE_THEME_PATH.'.account.elements.sidebar')
						<div class="col-lg-8">
							<div class="ps-section__right">
								<form class="ps-form--account-setting" action="{{ route('account.password-update') }}" method="post">
									@csrf
									<div class="ps-form__header">
										<h3> {{ __('Password') }}</h3>
									</div>
									<div class="ps-form__content">
										<div class="form-group">
											<label>{{ __('Old Password') }}</label>
											<input required type="password" class="form-control" name="password">
										</div>
										<div class="form-group">
											<label>{{ __('New Password') }}</label>
											<input required type="password" class="form-control"  name="newpassword">
										</div>
										<div class="form-group">
											<label>{{ __('Repeat New Password') }}</label>
											<input required type="password" class="form-control" name="password_confirmation" >
										</div>
									</div>
									<div class="form-group submit">
										<button type="submit" class="ps-btn">{{ __('Save Changes') }}</button>
									</div>
								</form>
							</div>
						</div>
                </div>
            </div>

           
        </main>

@endsection
