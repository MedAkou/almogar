<html {{ app('SiteSetting')->langAttribute() }}  {{ app('SiteSetting')->dirAttribute() }} >
<head>
          
      <!-- Page title -->
      <title>@yield('title')</title>

      <!-- meta -->
      <meta charset="utf-8">
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

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

      <!-- check for javascript -->
      <noscript>
        <meta http-equiv="refresh" content="0; url=http://www.google.com" />
      </noscript>

      <style>
        .navigation li a:hover {
    background: linear-gradient(to right, #0575E6, #00F260);
}
      </style>
      

      @FilemanagerScript

 </head>
<body>

  @include('manager/elements/alerts')


  @include('manager/elements/navbar')

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
       
         <!-- sidbar -->        
         @include('manager/elements/sidebar')

         <!-- Content  -->   
        @yield('content')

		</div>

	</div>


    <script src="/assets/admin/ckeditor/ckeditor.js?v={{ env('ASSETS_VERSION') }}"></script>
    <script src="/assets/admin/js/nestable.js?v={{ env('ASSETS_VERSION') }}"></script>
    <script src="/assets/admin/js/nestable++.js?v={{ env('ASSETS_VERSION') }}"></script>
    <script type="text/javascript" src="/assets/admin/js/main.js?v={{ env('ASSETS_VERSION') }}"></script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;libraries=places&amp;key=AIzaSyDwFc97AGfeqzqBmL2eVFxgeHm-CQNnvNM"></script>

  <script>
    
    $('#bystoreId').change(function(e){
    e.preventDefault();
    var store_id = $(this).val();
    var url = new URL(document.URL);

    if(window.location.href.indexOf('store_id=') > 0){
        url.searchParams.set('store_id', store_id);
    }else{
        url.searchParams.append('store_id', store_id); 
    }

    window.location.replace(url);
  });

    var latitude = 50.87;
   	var longitude = 10.445;

	if($("#latitude").val() && $("#longitude").val() ){
	  var latitude = $("#latitude").val();
	  var longitude = $("#longitude").val();
	}

	var map = new google.maps.Map(document.getElementById('map_canvas'), {
	    zoom: 12,
	    center: new google.maps.LatLng(latitude, longitude),
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var myMarker = new google.maps.Marker({
	    position: new google.maps.LatLng(latitude, longitude),
	    draggable: true
	});

	google.maps.event.addListener(myMarker, 'dragend', function (evt) {    
		$('#latitude').val(evt.latLng.lat().toFixed(3));
		$('#longitude').val(evt.latLng.lng().toFixed(3));
	});


	map.setCenter(myMarker.position);
	myMarker.setMap(map);

  </script>
</body>
</html>

