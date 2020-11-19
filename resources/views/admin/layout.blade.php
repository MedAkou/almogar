<html {{ app('SiteSetting')->langAttribute() }}  {{ app('SiteSetting')->dirAttribute() }} >
<head>
          
      <!-- Page title -->
      <title>@yield('title')</title>

      <!-- meta -->
      <meta charset="utf-8">
      
  <input type="hidden" id='dll' value="{{ Auth::user()->id }}">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- favicon -->
      <link rel="icon" type="image/x-icon" href="/assets/admin/images/favicon.png" /> 

      <!-- RTL css style -->
      {!! app('SiteSetting')->DashboardCss()  !!}
      <link rel="stylesheet" type="text/css" href="/assets/admin/css/main.css?v={{ env('ASSETS_VERSION') }}" />

      <!-- JS script -->
      <script type="text/javascript" src="/assets/admin/js/all.js?v={{ env('ASSETS_VERSION') }}"></script>

      <!-- check for javascript -->
      <noscript>
      <meta http-equiv="refresh" content="0; url=http://www.google.com" />
      </noscript>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">


      @FilemanagerScript

    <style>
      .table-responsive {
    overflow: hidden !important;
    overflow-x: scroll !important;
}
.navigation li a:hover {
    background: linear-gradient(to right, #0575E6, #00F260);
}
.table-responsive {
    overflow: initial !important;
}
    </style>


 </head>
<body>

  @include('admin/elements/alerts')

  @include('admin/elements/modals')

  @include('admin/elements/navbar')

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
       
         <!-- sidbar -->        
         @include('admin/elements/sidebar')

         <!-- Content  -->   
        @yield('content')

		</div>

	</div>
  
  
  
  <script src="/assets/admin/ckeditor/ckeditor.js?v={{ env('ASSETS_VERSION') }}"></script>
  <script src="/assets/admin/js/nestable.js?v={{ env('ASSETS_VERSION') }}"></script>
  <script src="/assets/admin/js/nestable++.js?v={{ env('ASSETS_VERSION') }}"></script>  
  <script type="text/javascript" src="/assets/admin/js/main.js?v={{ env('ASSETS_VERSION') }}"></script>
  <script src="{{ asset('assets/website/js/jquery.ez-plus.js') }}?v={{ env('ASSETS_VERSION') }}"></script>
  
  
  <style>
    div#productGallery .ProductGalleryItem {
    width: 44%;
    max-height: 150px;
}

div#productGallery {
    width: 100%;
    overflow: hidden;
    padding: 17px;
}
div#productGallery .ProductGalleryItem {
    overflow: hidden;
    float: left;
    background: whitesmoke;
    margin: 5px;
    border: 1px solid;
    position: relative;
    height: 150px;
}

div#productGallery .ProductGalleryItem img {
    width: 100%;
    object-fit: cover;
    height: 100%;
}

.ProductGalleryItem a {
    position: absolute;
    background: white;
    padding: 4px;
    display: inline-block;
    color: black;
}
  </style>
  


    <script type="text/javascript" src="https://jasonday.github.io/printThis/printThis.js"></script>


<script>



$('.limitPerCategory a').click(function(e){
  e.preventDefault();
  var category = $(this).attr('href');
  var url = new URL(document.URL);
  
  if(window.location.href.indexOf('category=') > 0){
      url.searchParams.set('category', category);
  }else{
      url.searchParams.append('category', category); 
  }

  if(window.location.href.indexOf('page=') > 0){
      url.searchParams.set('page', 1);
  }else{
      url.searchParams.append('page', 1); 
  }
  

  
  window.location.replace(url);
});




$('body #print_me').click(function(){
	$('body .table-responsive thead i').remove();
	$('body .table-responsive tr td:last-child').remove();
	$('body .table-responsive thead tr th:last-child').remove();
	$('body .table-responsive tr td:first-child').remove();

	$('body .table-responsive thead tr th:first-child').remove();



	$('body .table-responsive tr td:nth-child(6)').html('');
	$('body .table-responsive tr td:nth-child(7)').html('');



	$('body .table-responsive').printThis();
});


function print_table(){

	


}










$('body').attr('dsdmlsdq','kljdjkdd');



  $(".zoomimgs img").ezPlus();

  // the JSON data will come here

  // on check enable the button of chose image
  $(document).on('click', '.ProductGalleryItem a', function(e) {
      $(this).closest('.ProductGalleryItem').remove();
  });


window.myBulkSelectCallback = function (data) {


$.each(data, function(key,value) {
  var numItems = $('div#productGallery .ProductGalleryItem').length
  if( numItems < 4 ) {
      var html  = '<div class="ProductGalleryItem"><a href="javascript:;"><i class="icon-close2"></i></a><input type="hidden" name="gallery[]" value="'+value.absolute_url+'"><img src="'+value.absolute_url+'" > </div>';
      $('#productGallery').append(html);

    }
}); 

  
};



var categorySelect = $('body .categoryedit');
if(categorySelect.length){
  var val = $('body .categoryedit').attr('data-id');
  $('body .categoryedit').val(val);
}




//  upload file
$('#uploader').submit(function(e) {
        e.preventDefault();
        var token   = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData(this);
        formData.append('_token', token);  
        $.ajax({
        type: 'POST',
        url: '{{ route('admin.media.upload') }}',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend: function(data) {
            $("#submitResult").html('???? ??? ????? ??????? ???????? ?????');
        },
        success: function(data) {
           $('#uploader').trigger("reset");
           $("#submitResult").html('?? ??? ????? ?????');
           if($('#media_table').length){
            $(".media-table tbody").prepend(data);
           }else {
                location.reload();
           }
        },
        error: function(data) {
            $("#submitResult").html("??? ??? ?? ? ??????? ???????? ?? ????");
        }
        });
});  


// delete file
$('body .media_delete').click(function(e){
        e.preventDefault();
        var token   = $('meta[name="csrf-token"]').attr('content');
        var file    = $(this).attr('data-media-id');
        var formData = new FormData();
        formData.append('_token', token);  
        formData.append('file', file);  
        $.ajax({
          type: 'POST',
          url: '{{ route('admin.media.delete') }}',
          data:formData,
          cache:false,
          contentType: false,
          processData: false,
          success: function(data) {
               $('#media-'+file).remove();
          },
        });                             
});


/****** Check Box Table With Ids System *********/
$(document).ready(function() {
  var $selectAll = $('#checkAll'); // main checkbox inside table thead
  var $table = $('.table'); // table selector 
  var $tdCheckbox = $table.find('tbody .check'); // checboxes inside table body
  var tdCheckboxChecked = 0; // checked checboxes
  

  // Select or deselect all checkboxes depending on main checkbox change
  $selectAll.on('click', function () {
    $tdCheckbox.prop('checked', this.checked);
    getselected();
  });

  // Toggle main checkbox state to checked when all checkboxes inside tbody tag is checked
  $tdCheckbox.on('change', function(e){
    tdCheckboxChecked = $table.find('tbody input:checkbox:checked').length; // Get count of checkboxes that is checked
    // if all checkboxes are checked, then set property of main checkbox to "true", else set to "false"
    $selectAll.prop('checked', (tdCheckboxChecked === $tdCheckbox.length));
    getselected();
  })
  
  function getselected(){
    var $ids  = new Array();
    $(".table tbody .check[type=checkbox]:checked").each(function () {
            $ids.push($(this).data('item'));
    });

      var count = $ids.length;
      if(count > 0 ){
          // do what you want with ids here
          $('.num_num').each(function(){
            $(this).html(' ('+count+') ');
          });
          $('#selectedRows').val($ids);
          $('#AssignToProductIDS').val($ids);
          $('#AssignToDelete').val($ids);
          $('#bulkactivatedProductIDS').val($ids);
          $('#bulkdeactivatedProductIDS').val($ids);
      }else {

          $('.num_num').each(function(){
            $(this).html('');
          });
          $('#selectedRows').val('');
          $('#AssignToProductIDS').val('');
          $('#AssignToDelete').val('');
          $('#bulkactivatedProductIDS').val('');
          $('#bulkdeactivatedProductIDS').val('');

      }
   
  }
});


/************* CheckBox Table JS **************/    

$('#deleteOrdersModal form').submit(function(e){
  e.preventDefault();
  if(!$('#AssignToDelete').val()){
    var alertempty = '<div class="alert alert-danger"> please select </div>';
    
    if($('#deleteOrdersModal .modal-body form .alert').length){
        return false;
    }else{
        $('#deleteOrdersModal form').prepend(alertempty);
    }
    return false;
  }
  $(this)[0].submit();
});

  
  </script>
  <input type="hidden" id="selectedRows">
</body>
</html>
