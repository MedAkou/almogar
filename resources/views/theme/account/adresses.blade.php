@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
@section('title')
{{ __('Adresses') }}
@endsection

@section('content')


        <main class="main">
            <div class="ps-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="icon-home"></i></a></li>
                        <li>{{ __('account') }}</li>
                        <li>{{ __('Adresses') }}</li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    



                    @include(\System::$ACTIVE_THEME_PATH.'.account.elements.sidebar')
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                    
                            <div class="ps-form__header">
                                <h3> {{ __('Adresses Book') }}</h3>
                            </div>

                            @foreach(Auth::user()->addresses as $addresse)
                            <figure class="ps-block--address @if( $addresse->is_primary == '1' ) active @endif">
                                <div class="ps-block__content">
                                    <p>
                                        {{ $addresse->given_name }}<br>
                                          {{ $addresse->street }} <br>
                                          {{ $addresse->state }}, {{ $addresse->housenumber }} ,  {{ $addresse->city }} , {{ $addresse->postal_code }} <br>
                                          {{ $addresse->country_code }} <br>
                                          {{ $addresse->phone }}                                          
                                    </p>
                                    <a class="ps-btn" href="{{ route('account.shipping.edit',['id' =>  $addresse->id ]) }}"> {{ __('Edit') }}</a>
                                    <a class="ps-btn" href="{{ route('account.shipping.delete',['id' =>  $addresse->id]) }}"> {{ __('Delete') }}</a>
                                    @if(!$addresse->is_primary) 
                                    <a class="ps-btn" href="{{ route('account.shipping.default',['id' =>  $addresse->id]) }}"> {{ __('set As Default') }}</a>
                                    @endif
                                </div>
                            </figure>
                            @endforeach 


                          

                         

                            </div>


                            <div class="form-group">    
                                <a class="ps-btn" style="margin-top:15px;" href="{{ route('account.shipping.add') }}" class="btn btn-sm btn-outline-secondary btn-new-address" >{{ __('+ New Address') }}</a>
                            </div>
                    
                        </div>
                </div>
            </div>

           
        </main>





@endsection