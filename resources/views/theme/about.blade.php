@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
@section('title')
{{ __('About Us') }}
@endsection

@section('content')



  <main class="main">


            <div class="ps-about-intro">
                <div class="container">
                    <div class="ps-section__header">
                        <h4> {{ __('Welcome+') }} </h4>
                        <p>
                            {{ __('An online website that acts as an intermediary between shopkeepers and customers.') }} <br>
                            {{ __('Offering an online shopping service to reduce congestion and save time for everyone.') }}  <br>
                            {{ __('It does this through their unrestricted support to make the buying process comfortable and safe for everyone and easy access to grocery stores for everyone.') }}
                        </p>
                    </div>
                </div>
            </div><!-- End .container -->


            <div class="ps-section__content" style="display: none;">
                    <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-block--icon-box"><i class="icon-cube"></i>
                                <h4>45{{ __('M') }}</h4>
                                <p>{{ __('Product for sale') }}</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-block--icon-box"><i class="icon-store"></i>
                                <h4>1.8{{ __('M') }}</h4>
                                <p>{{ __('Sellers Active on Martfury') }}</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-block--icon-box"><i class="icon-bag2"></i>
                                <h4>30.6{{ __('M') }}</h4>
                                <p>{{ __('Buyer active on Martfury') }} </p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-block--icon-box"><i class="icon-cash-dollar"></i>
                                <h4>2.46${{ __('M') }}</h4>
                                <p>{{ __('Annual gross merchandise sales') }}</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>






        </main><!-- End .main -->




@endsection