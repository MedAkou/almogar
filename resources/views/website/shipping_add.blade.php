@extends('website/layout') 
@section('title') 
    {{ __('Add shipping ') }}
@endsection 

@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home',['store' => $store ]) }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">{{ __('account') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Add shipping') }}</li>
            </ol> 
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last dashboard-content">
                <h2>{{ __('Add new adress') }}  </h2>

                <form action="{{ route('shipping.add',['store' => $store ]) }}" method='post'>
                    @csrf


                    <div class="form-group required-field">
                        <label>{{ __('Full Name ') }}</label>
                        <input type="text" class="form-control" name="given_name" required>
                    </div>

                    <div class="form-group required-field">
                        <label>{{ __('Street Address') }} </label>
                        <input type="text" class="form-control" name="street" required>
                    </div>


                    <div class="row">
                    
                        <div class="col-md-6">
                            <div class="form-group required-field">
                                <label>{{ __('City') }} </label>
                                <input type="text" class="form-control" name="city" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required-field">
                                <label>{{ __('Zip/Postal Code ') }}</label>
                                <input type="text" class="form-control" name="postal_code" required>
                            </div>
                        </div>

                    </div>


                        
                      

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Country') }}</label>
                                <input type="text" class="form-control" name="country_code" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('State/Province') }}</label>
                                <input type="text" class="form-control" name="state">
                            </div>
                        </div>
                     
                    </div>

                    <div class="form-group required-field">
                        <label>{{ __('Phone Number') }} </label>
                        <div class="form-control-tooltip">
                            <input type="tel" class="form-control" name="phone" required>
                        </div>
                    </div>
                    <div class="checkout-steps-action">
                        <input type="submit" class="btn btn-primary btn-block" value="{{ __('Save Changes') }}" />
                    </div>
                </form>

            </div>

            @include('website.elements.sidebar')
        </div>
    </div>

</main>

@endsection