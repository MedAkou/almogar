@extends(\System::$ACTIVE_THEME_PATH.'/layout')
@section('title')
{{ __('Forgot Password') }}
@endsection

</pre>
@section('content')

 <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Forgot Password') }}</li>
                    </ol>
                </div>
            </nav>

            <div class="container">
                <div class="heading mb-4">
                    <h2 class="title">{{ __('Reset Password') }}</h2>
                    <p>{{ __('Please enter your email address below to receive a password reset link') }}</p>
                </div>

                <form action="#">
                    <div class="form-group required-field">
                        <label for="reset-email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="reset-email" name="reset-email" required>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Reset My Password') }}</button>
                    </div>
                </form>
            </div>

            <div class="mb-10"></div>
        </main>

@endsection