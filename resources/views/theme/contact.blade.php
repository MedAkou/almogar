@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
@section('title')
    
    {{ __('contact us') }}

@endsection

@section('content')

 <main class="main">
    <div class="ps-contact-form">
        <div class="container">
            <form class="ps-form--contact-us" action="{{ route('contact.send') }}" method="get">
                {!! csrf_field() !!}
                <h3>{{ __('Contact Us') }}</h3>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" id="contact-name" name="name" type="text" placeholder="{{ __('Name') }}" required>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" id="contact-email" name="email" type="text" placeholder="{{ __('Email') }}" required>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                            <input class="form-control" id="contact-phone" name="phone" type="text" placeholder="{{ __('Phone Number') }}" required>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="contact-message" class="form-control" name="message" placeholder="{{ __('What’s on your mind?') }}" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group submit">
                    <button class="ps-btn">{{ __('Send Message') }}</button>
                </div>
            </form>
        </div>
    </div>
        </main>




@endsection







