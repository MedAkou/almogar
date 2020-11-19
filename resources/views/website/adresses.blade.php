@extends('website/layout')
@section('title')
{{ __('Adresses') }}
@endsection

@section('content')


        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home',['store' => $store ]) }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">{{ __('account') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Adresses') }}</li>
                    </ol>                
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-last dashboard-content">
                        <h2>{{ __('Adresses Book') }}  </h2>
                        <div class="row">
                            
                            @foreach(Auth::user()->addresses as $addresse)
                            <div class="col-md-6">  

                            <div class="shipping-address-box @if($addresse->is_primary) active @endif" style="width: 100%">
                                          {{ $addresse->given_name }}<br>
                                            {{ $addresse->street }} <br>
                                            {{ $addresse->state }},  {{ $addresse->city }} , {{ $addresse->postal_code }} <br>
                                            {{ $addresse->country_code }} <br>
                                            {{ $addresse->phone }} <br>
                                            <a href="{{ route('shipping.edit',['id' =>  $addresse->id  ,'store' => $store ]) }}" class="btn btn-sm btn-link"> {{ __('Edit') }}</a>
                                            <a href="{{ route('shipping.delete',['id' =>  $addresse->id ,'store' => $store ]) }}" class="btn btn-sm btn-link"> {{ __('Delete') }}</a>
                                            @if(!$addresse->is_primary) 
                                            <a href="{{ route('shipping.default',['id' =>  $addresse->id ,'store' => $store ]) }}" class="btn btn-sm btn-link"> {{ __('set As Default') }}</a>
                                            @endif
                            </div>
                            
                            </div>
                            @endforeach 


                          

                         

                            </div>


                            <div class="form-group">    
                                <a style="margin-top:15px;" href="{{ route('shipping.add',['store' => $store ]) }}" class="btn btn-sm btn-outline-secondary btn-new-address" >{{ __('+ New Address') }}</a>
                            </div>
                          
        
                        </div>
                    



                    @include('website.elements.sidebar')
                </div>
            </div>

           
        </main>





@endsection
