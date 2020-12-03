 @extends('admin/layout') @section('title') {{ __('Products Categories Create ') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">



    <div class="page-header page-header-default ">
        <div class="page-header-content">
            <div class="page-title">
                <h1><span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>
       {{ __('Product categories') }}
       </span></h1><a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
            <div class="heading-elements"></div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.home') }}" title=""><i class="icon-home2 position-left"></i>
    {{ __('Home') }}
    </a></li>
                <li class="active" title="{{ __('Products categories') }}">{{ __('Products categories') }}</li>
            </ul>
        </div>
    </div>

    <!-- Content area -->
    <div class="content">
        @include('manager/elements/form-messages')




        <div class="col-md-6">
            <form method="post" action="{{ route('admin.products.categories.store') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
            <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">{{ __('add new categorie') }}</h6>
               
            </div>

                                @php
                                    $langs = \System::$LANGS_NAME;
                                @endphp
            


            <div class="panel-body">
                <div class="tabbable tab-content-bordered">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        @foreach($langs as $key  => $lang)
                           <li @if ($loop->first) class="active" @endif >
                            <a href="#bordered-{{ $key }}" data-toggle="tab">{{ $lang }}</a></li>
                        @endforeach
                      
                    </ul>

                    <div class="tab-content">
                        @foreach($langs as $key  => $lang)
                        <div class="tab-pane has-padding @if ($loop->first) active @endif "  id="bordered-{{ $key }}">

                        <fieldset class="content-group">

                            <div class="form-group">
                                <label class="control-label">{{ __('categorie name') }}</label>
                                <input type="text" value="" class="form-control frequired" name="name_{{$key }}" placeholder="{{ __('categorie name') }}">
                            </div>
                            @if($key == "de")
                            <div class="form-group">
                                <label class="control-label">{{ __('categorie link') }}</label>
                                <input type="text" value="" class="form-control frequired" name="slug" placeholder="{{ __('categorie link') }}">
                            </div>

                            <div class="form-group">
                                <input type="file" name="image" id="image" style="display: none;">
                                <label class="btn btn-danger btn-rounded" for='image'> <i class="icon-image2 position-left"></i> {{ __('image') }}</label>
                            </div>
                            @endif

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('add categorie') }}
                                    <i class="icon-arrow-left13 position-right"></i>
                                </button>
                            </div>
                        </fieldset>  
                        </div>
                         @endforeach
                                              
                    </div>
                </div>
            </div>
        </div>
      </form>
        </div>
                    


        <div class="col-md-6">
            <div class="panel panel-flat table-panel table-responsive">
                <table class="table datatable datatable-basic">
                    <thead>
                        <tr>
                            <th><b> # </b></th>
                            <th><b> {{ __('image') }} </b></th>
                            <th><b>{{ __('name') }}</b></th>
                            <th><b>{{ __('link') }}</b></th>
                            <th><b>{{ __('total products') }}</b></th>
                            <th><b>{{ __('edit') }}</b></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $categorie)
                        <tr>
                            <td>{{ $categorie->id}}</td>
                            <td>

                                <div class="product-image-list">
                                    {!! $categorie->presentThumbnail() !!}
                                </div>

                            </td>
                            <td>{{ $categorie->name}}</td>
                            <td>{{ $categorie->slug}}</td>
                            <td>{{ $categorie->products->count()}}</td>
                            <td>
                                 @php
                                        $store = \Auth::User()->store->slug;
                                @endphp
                                <a class="edit btn btn-success btn-block hidden-md hidden-lg hidden-sm" href="javascript:;">edit</a>
                                <ul class="icons-list hidden-xs">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            
                                            <li>
                                                <li><a href="{{ route('admin.products.categories.edit',['id' => $categorie->id]) }}" class="text-primary-600"><i class="icon-pencil7 position-left"></i><b>{{ __('Edit') }}</b>
                      </a></li>
                                                <li><a class='text-danger' href="{{ route('admin.products.categories.delete',['id' => $categorie->id]) }}"><i class="icon-trash"></i><b>{{ __('Delete') }}</b></a>

                                                </li>
                                        </ul>
                                        </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection