@extends(\System::$ACTIVE_THEME_PATH.'/layout') 
@section('title') 
    {{ __('add shipping ') }}
@endsection 

@section('content')

<main class="main">   

    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="http://almogar.test:82/matjar"><i class="icon-home"></i></a></li>
                <li>{{ __('Dashboard') }}</li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-lg-last dashboard-content">
                <h2>{{ __('Add new adress') }}  </h2>

                <form action="{{ route('shipping.update',['id' => $address->id , 'store' => $store]) }}" method='post'>
                    @csrf
                    <div class="form-group required-field">
                        <label>{{ __('Full Name ') }}</label>
                        <input type="text" class="form-control" name="given_name" value="{{ $address->given_name }}" required/>
                    </div>

                    <div class="form-group required-field">
                        <div class="row">
                            <div class="col-md-6">
                            <label>{{ __('Street Address') }} </label>
                            <input type="text" class="form-control" name="street" value="{{ $address->street }}" required/>
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('house number') }} </label>
                            <input type="text" class="form-control" name="housenumber" value="{{ $address->housenumber }}" required/>
                        </div>
                        </div>
                        
                    </div>

                    <div class="form-group required-field">
                        <label>{{ __('City') }} </label>
                        <input type="text" class="form-control" name="city"  value="{{ $address->city }}" required/>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('Country') }}</label>
                                <input type="text" class="form-control" name="country_code"  value="{{ $address->country_code }}" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('State/Province') }}</label>
                                <input type="text" class="form-control" name="state"  value="{{ $address->state }}"  required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group required-field">
                                <label>{{ __('Zip/Postal Code ') }}</label>
                                <input type="text" class="form-control" name="postal_code" value="{{ $address->postal_code }}" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group required-field">
                        <label>{{ __('Phone Number') }} </label>
                        <div class="form-control-tooltip">
                            <input type="tel" class="form-control" name="phone"  value="{{ $address->phone }}"  required/>
                        </div>
                    </div>
                    <div class="checkout-steps-action">
                        <input type="submit" class="ps-btn" value="{{ __('Save Changes') }}" style="display: block; height: 50px;" />
                    </div>
                </form>

            </div>

            @include(\System::$ACTIVE_THEME_PATH.'/elements.sidebar')
        </div>
    </div>

</main>

@endsection