 @extends('admin/layout') 

 @section('title') 

 {{ __(' Menu') }} 

 @endsection 

 @section('content')




<!-- Main content -->
<div class="content-wrapper">


    <!-- Basic modal -->
    <div id="modal_default" class="modal fade">
        <div class="modal-dialog">

            <form action="{{ route('admin.menus.store') }}" id="CreateMenu" method="POST">
                @csrf
                <input type="hidden" id='menuarea' value="" />
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">{{ __('create menu name') }}</h5>
                    </div>
                    <div class="modal-body">
                        <div id="result"></div>
                        <h6 class="text-semibold">{{ __('menu name') }}</h6>
                        <input type="text" class="form-control frequired" name="name" placeholder="{{ __('menu name') }}" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('create menu') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /basic modal -->




    <!-- Page header -->
    <div class="page-header page-header-transparent">
        <div class="page-header-content">
            <div class="page-title">
                <h1><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">{{ __('Menu') }}</span></h1>
            </div>
            <div class="heading-elements">

            </div>
        </div>
    </div>
    <!-- /page header -->

          <!-- Content area -->
      <div class="content">

           
              

      <div class="row">


      <div class="col-md-12">
          <div class=" navbar navbar-default navbar-component navbar-xs" style="padding:10px;">
              <div class="col-md-2 " style="padding-top:10px;">{{ __('chose a menu to edit') }}</div>
              <div class="col-md-3">

                  <select class="form-control menuListSelect" style="width:100%;">
                      <option value="not_speci" >— {{ __('chose') }} —</option>
                      @foreach($menus as $item)
                      <option value="{{ route('admin.menus.edit',['id' => $item->id ]) }}">{{ $item->name }}</option>
                      @endforeach
                  </select>

              </div>
              <div class="col-md-3" style="padding-top:10px;">
                  {{ __('or') }} <a data-toggle="modal" data-target="#modal_default">{{ __('create new menu') }}</a></div>
          </div>
      </div>





    @php
      if($menu):
    @endphp


    {!! $menu->printInput() !!}


        <div class="col-md-3 hdoi">


              <div class="panel-group content-group" id="menu-accordion">
                <div class="panel panel-default hidden">
                    <div class="panel-heading">
                        <h6 class="panel-title text-semibold">
                           <a data-toggle="collapse" data-parent="#menu-accordion" href="#accordion1"> {{ __('categories') }}</a>
                        </h6>
                    </div>
                    <div id="accordion1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form id="menu-add-pages">
                                <ul style="list-style:none;">
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="" class="styled" data-name='' data-slug="" />

                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <div class="form-group">
                                    <button class="btn btn-info" id="addButtonPages"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


              <div class="panel panel-default hidden">
                <div class="panel-heading">
                    <h6 class="panel-title text-semibold">
                      <a data-toggle="collapse" data-parent="#menu-accordion" href="#accordion2"></a>
                  </h6>
                </div>
                <div id="accordion2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form id="menu-add-posts">
                            <div class="form-group">
                                <button class="btn btn-info" id="addButtonPages"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h6 class="panel-title text-semibold">
                      <a data-toggle="collapse" data-parent="#menu-accordion" href="#accordion3">
                        <h6>{{ __('Add new menu item') }}</h6>
                      </a>
                  </h6>
                </div>
                <div id="accordion3" class="panel-collapse collapsed">
                    <div class="panel-body">

                     <form id="menu-add">
                        <div class="form-group">
                          <label for="addInputName">{{ __('Name') }}</label>
                          <input type="text" class="form-control" id="addInputName"  required>
                        </div>
                        <div class="form-group">
                          <label for="addInputSlug">{{ __('Slug') }}</label>
                          <input type="text" class="form-control" id="addInputSlug"  required>
                        </div>
                        <button class="btn btn-info" id="addButton">{{ __('Add') }}</button>
                      </form>
                    </div>
                </div>
            </div>




            <div class="panel panel-default" id="menu-editor" style="display: none;">
                <div class="panel-heading">
                    <h6 class="panel-title text-semibold">
                      <a data-toggle="collapse" data-parent="#menu-accordion" href="#accordion3">
                        <h6>{{ __('edit menu item') }} : <span id="currentEditName"></span> </h6>
                      </a>
                  </h6>
                </div>
                <div id="accordion3" class="panel-collapse collapsed">
                    <div class="panel-body">

                     <form >
                      <div class="form-group">
                        <label for="addInputName">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="editInputName" placeholder="Item name" required>
                      </div>
                      <div class="form-group">
                        <label for="addInputSlug">{{ __('Slug') }}</label>
                        <input type="text" class="form-control" id="editInputSlug" placeholder="item-slug">
                      </div>
                      <button class="btn btn-info" id="editButton">{{ __('Edit') }}</button>
                    </form>


                    </div>
                </div>
            </div>



            



          </div>
    
        </div>
        
        
        <div class="col-md-9">
            

            <form action="{{ route("admin.menus.update") }}" method='post'>
            @csrf

            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
            
            <div class="panel">
                <div class="panel-heading" >
                    <h6 class="panel-title">
                    <input type="text" name="name" placeholder="" value="{{ $menu->name }}" class="form-control" style="width:250px;" />
                    </h6>
                    <div class="heading-elements">
                        <button type="submit" class="btn btn-info" id="addButtonPages">{{ __('save menu') }}</button>
                    </div>
                </div>
            <legend style="padding-top: 0;margin-top: -9px;"></legend>
                <div class="panel-body">
                
                <!-- Menu start Here  -->


          <div class="dd nestable">
            <ol class="dd-list">

             
            @php
              if(!empty($htmlMenu )):
            @endphp
             
              @foreach($htmlMenu as $item)
              
              <!--- Item1 --->
              <li class="dd-item" data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}" data-slug="{{ $item['slug'] }}" data-new="0" data-deleted="0">
                <div class="dd-handle">{{ $item['name'] }}</div>
                <span class="button-delete btn btn-default btn-xs pull-right"
                      data-owner-id="{{ $item['id'] }}">
                  <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                </span>
                <span class="button-edit btn btn-default btn-xs pull-right"
                      data-owner-id="{{ $item['id'] }}">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </span>

                    @isset($item['children'])
                    <ol class="dd-list">

                      
                        @foreach($item['children'] as $child)
                        <!--- Item4 --->
                        <li class="dd-item" data-id="{{ $child['id'] }}" data-name="{{ $child['name'] }}" data-slug="{{ $child['slug'] }}" data-new="0" data-deleted="0">
                            <div class="dd-handle">{{ $child['name'] }}</div>
                            <span class="button-delete btn btn-default btn-xs pull-right"
                                  data-owner-id="{{ $child['id'] }}">
                              <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                            </span>
                            <span class="button-edit btn btn-default btn-xs pull-right"
                                  data-owner-id="{{ $child['id'] }}">
                              <i class="fa fa-pencil" aria-hidden="true"></i>
                            </span>
                        </li>
                        @endforeach

                        
                    </ol>
                    @endisset
              </li>
              @endforeach

              @php
                endif
              @endphp

             
              
          
            </ol>
          </div>
        
          <div class="row output-container">
            <div class="col-md-offset-1 col-md-10">
              
                <textarea style="display: none;" class="form-control"  name='menu_json'  id="json-output" rows="5"></textarea>
              
            </div>
          </div>
                <!-- Menu Ends Here  -->
                
                
                <legend></legend>
                
                <b>{{ __('Display location') }}</b>

                <br/>
                <br/>

                <ul class="list-style" style="list-style:none;">
                    <li>
                     <input type="radio" name="area" id="phone" value="phone" />
                     <label for="phone"> {{ __('Phone menu ') }} </label>
                    </li>
                    <li style="display: none;">
                     <input type="radio" id="top_menu" name="area" value="top" />
                     <label for="top"> {{ __('top menu') }}  </label>
                    </li>
                    <li>
                     <input type="radio" name="area" id="main_menu" value="main" />
                     <label for="main"> {{ __('main menu') }} </label>
                    </li>      
                    <li style="display: none;">
                     <input type="radio" name="area" id="footer" value="footer" />
                     <label for="footer"> {{ __('footer menu') }} </label>
                    </li>
                    <li>
                     <input type="radio" name="area" id="footer" value="homeCategories" />
                     <label for="footer"> {{ __('product categories home') }} </label>
                    </li>
                </ul>
                </div>
                <p>
                    <a href="{{ route('admin.menus.delete',['id' => $menu->id]) }}" class="text-danger delete-menu-link" style="margin-right:15px;" href="">
                        {{ __('delete menu') }}
                    </a>
                </p>
            </div>
            </form> 


        </div>
        
        
    </div>
      



  @php
    endif;
  @endphp



      
      </div>


          </div>

        </div>
    </div>
    @endsection