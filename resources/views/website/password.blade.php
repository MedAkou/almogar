@extends('website/layout')
@section('title')
{{ __('Password') }}
@endsection

@section('content')


        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home',['store' => $store ]) }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">{{ __('account') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Password') }}</li>
                    </ol>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-last dashboard-content">
                        <h2>{{ __('Password') }}  </h2>
                        
                        <form method="post" action="{{ route('password-update',['store' => $store ]) }}">
                      	    @csrf
						   <div class="content">
						      <ul class="form-list">
						         <div class='form-group'>
						            <label>{{ __('Old Password') }}  </label>
						            <input type="password" class="form-control" name="password">
						         </div>
						         <div class='form-group'>
						            <label>{{ __('New Password') }}</label>
						            <input type="password" class="form-control"  name="newpassword">
						         </div>
						         <div class='form-group'>
						            <label>{{ __('Repeat New Password') }}</label>
						            <input type="password" class="form-control" name="password_confirmation" >
						         </div>
						      </ul>

						      <div class="buttons-set">
						         <button type="submit" class="btn btn-primary button"><span>{{ __('Save Changes') }}</span></button>
						      </div>
						   </div>
						</form>

                		</div>
                    
						@include('website.elements.sidebar')
                </div>
            </div>

           
        </main>

@endsection
