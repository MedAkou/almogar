@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
@section('title')
{{ __('Edit Account') }}
@endsection

@section('content')

 <main class="main">

            <div class="ps-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="icon-home"></i></a></li>
                        <li>{{ __('account') }}</li>
                        <li>{{ __('Dashboard') }}</li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @include(\System::$ACTIVE_THEME_PATH.'.account.elements.sidebar')
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                            <form class="ps-form--account-setting" action="{{ route('account.update') }}" method="post">
                                @csrf
                                <div class="ps-form__header">
                                    <h3> {{ __('Edit Account Information') }}</h3>
                                </div>
                                <div class="ps-form__content">
                                    <div class="form-group">
                                        <label>{{ __('Name') }}</label>
                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{ __('Phone number') }}</label>
                                                <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{ __('Email') }}</label>
                                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group submit">
                                    <button type="submit" class="ps-btn">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5"></div>
</main>


@endsection