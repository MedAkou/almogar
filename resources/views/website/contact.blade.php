@extends('website/layout')
@section('title')
{{ __('contact us') }}
@endsection

@section('content')


 <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Contact Us') }}</li>
                    </ol>
                </div>
            </nav>

            <div class="container">

                <div class="row">
                    <div class="col-md-8">
                        <h2 class="light-title">{{ __('Write') }} <strong>{{ __('Us') }}</strong></h2>

                        <form method="post" action="{{ route('contact.send',['store' => $store ]) }}" id="formcontact">
                                                    {!! csrf_field() !!}

                            <div class="form-group required-field">
                                <label for="contact-name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="contact-name" name="contact-name" required>
                            </div>

                            <div class="form-group required-field">
                                <label for="contact-email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="contact-email" name="contact-email" required>
                            </div>

                            <div class="form-group">
                                <label for="contact-phone">{{ __('Phone Number') }}</label>
                                <input type="number" class="form-control" id="contact-phone" name="contact-phone">
                            </div>

                            <div class="form-group required-field">
                                <label for="contact-message">{{ __('What’s on your mind?') }}</label>
                                <textarea cols="30" rows="1" id="contact-message" class="form-control" name="contact-message" required></textarea>
                            </div>

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block" id="btnsubmite">{{ __('Send Message') }} </button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <h2 class="light-title">{{ __('Contact') }} <strong>{{ __('Details') }}</strong></h2>

                        <div class="contact-info">
                            
                            <div>
                                <i class="icon-mobile"></i>
                                <p><a href="tel:{{ option('phonenumber') }}">{{ option('phonenumber') }}</a></p>
                            </div>
                            <div>
                                <i class="icon-mail-alt"></i>
                                <p><a href="mailto:{{ option('email') }}">{{ option('email') }}</a></p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8"></div>
        </main>




@endsection