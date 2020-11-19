@extends('website/layout')
@section('title')
{{ __('Edit Account') }}
@endsection

@section('content')


 <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home',['store' => $store ]) }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                    </ol>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-last dashboard-content">
                        <h2>{{ __('Edit Account Information') }}</h2>
                        <form action="{{ route('update',['store' => $store ]) }}" method='post'>
                            @csrf
                            <div class="form-group required-field">
                                <label>{{ __('Name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="form-group required-field">
                                <label>{{ __('Phone number') }}</label>
                                <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" required>
                            </div>
                            <div class="form-group required-field">
                                <label>{{ __('Email') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="required text-right">{{ __('* Required Field') }}</div>
                            <div class="form-footer">
                                <div class="form-footer-right">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('website.elements.sidebar')
                </div>
            </div>
            <div class="mb-5"></div>
</main>


@endsection