@extends(\System::$ACTIVE_THEME_PATH.'/layout')
@section('title')
{{ __('Adresses') }}
@endsection
@section('content')
<main class="main">
   <div class="ps-breadcrumb">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="{{ route('home',['store' => $store ]) }}">Home</a></li>
            <li>{{ __('account') }}</li>
            <li>{{ __('Adresses') }}</li>
         </ul>
      </div>
   </div>
   <div class="container">
      <div class="row">
         @include(\System::$ACTIVE_THEME_PATH.'/elements.sidebar')
         <div class="col-lg-8">
            <div class="ps-section__right">
               <div class="ps-form__header">
                  <h3> {{ __('Adresses Book') }}</h3>
               </div>
               @foreach(Auth::user()->addresses as $addresse)
               <figure  class="ps-block--address @if( $addresse->is_primary == '1' ) active @endif">
                  <div class="ps-block__content d-flex flex-column mt-3">
                     <p>
                        {{ $addresse->given_name }}<br>
                        {{ $addresse->street }} <br>
                        {{ $addresse->state }}, {{ $addresse->housenumber }} ,  {{ $addresse->city }} , {{ $addresse->postal_code }} <br>
                        {{ $addresse->country_code }} <br>
                        {{ $addresse->phone }}                                          
                     </p>
                     <div>
                        <a class="ps-btn sm" href="{{ route('shipping.edit',['id' =>  $addresse->id  ,'store' => $store ]) }}"> {{ __('Edit') }}</a>
                        <a class="ps-btn sm delete" href="{{ route('shipping.delete',['id' =>  $addresse->id ,'store' => $store ]) }}"> {{ __('Delete') }}</a>
                        @if(!$addresse->is_primary) 
                        <a class="ps-btn" href="{{ route('shipping.default',['id' =>  $addresse->id ,'store' => $store ]) }}"> {{ __('set As Default') }}</a>
                        @endif
                     </div>
                  </div>
               </figure>
               @endforeach 
            </div>
            <div class="form-group">    
               <a class="ps-btn" style="margin-top:30px;" href="{{ route('shipping.add',['store' => $store ]) }}" class="btn btn-sm btn-outline-secondary btn-new-address" >{{ __('+ New Address') }}</a>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection