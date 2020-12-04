







$('.dd.nestable').nestable({
maxDepth: 2
})
.on('change', updateOutput);


$('body .menuListSelect').change((function(event) {
    var url = $(this).val(); 
    if (url) { 
        window.location = url;
    }
    return false;
}));

if($('#menuareaselected').length){
    var value = $('#menuareaselected').val();
    $("input[name=area][value=" + value + "]").attr('checked', 'checked');
}













var orderSelect = $('#order_statue');
  if(orderSelect.length){
}
  

$('#order_statue').on('change', function () {
    var url = $(this).val(); // get selected value
    if (url) { // require a URL
        window.location = url; // redirect
    }
    return false;
});


// product Thumbnail
function readURL(input,output) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $(output).append('<img src="'+ e.target.result +'" />');
            }
        reader.readAsDataURL(input.files[0]);
        }
}
$("#uploadThumbnail").change(function(){
    $('#MediaThumbnail').html('');
    readURL(this,'#MediaThumbnail');
});



/****** Image Gallery Create ************/
$("#AddProductImagesGallery").click(function(){
 $('.galleryRows').append('<div class="galleryRow"> <div class="col-md-6"> <input type="file" class="galleryinput" name="gallery[]" /> </div> <div class="col-md-5 gallery_thumbnail" > </div> <div> <a href="javascript:;" class="removeImage"> <i class="icon-close2"></i> </a> </div> </div>');
});
$(document).on('click', '.removeImage', function() {
   $(this).closest('.galleryRow').remove();
});




var lang = document.getElementsByTagName("html")[0].getAttribute("lang");

if($('#posteditor').length){ 
  CKEDITOR.replace( 'posteditor', { 
    language: lang  , 
    height: 400
  });
}

$( "[name^='description_']" ).each(function(index, el) {

      var hot = $(this).attr('id');
      CKEDITOR.replace( hot , { 
        language: lang  , 
        height: 400
     });
});








    
// show the uploader
$(".showUploader").click(function() {
    $(".uploader_sec").show();
});
$(".showUploader2").click(function() {
    $(".empty_state").remove();
    $(".uploader_sec").show();
});
$("#medialibrary").click(function() {
      $(".mediauploder .modal-footer").css("visibility", "visible");
});








/*

// show the uploader in media page
  $("form").submit(function(e) {
    e.preventDefault(); 
   var empty=false;
    $('form .rf').each(function( e ) {
  if( !$(this).val())
    {
      empty=true;
    };
});

      if ( empty){
        $('.empty-form').show();
           return false;
      }
      else{
$('.empty-form').hide();
      }
$(this)[0].submit();
  });
*/



    
  document.querySelectorAll('.table-responsive').forEach(function (table) {
    let labels = Array.from(table.querySelectorAll('th')).map(function (th) {
        return th.innerText
    })
    table.querySelectorAll('td').forEach(function (td, i) {
        td.setAttribute('data-label', labels[i % labels.length]);
    })
});

      
  // show the uploader in media page
  $(".showUploader").click(function() {
      $(".uploader_section").show();
  });

  
// Go back button in admin pages header
$(document).ready(function(){
  $('.goback').click(function(){
    parent.history.back();
    return false;
  });
});

// open the page in full screen mode
function go_full_screen(){
  var elem = document.documentElement;
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.msRequestFullscreen) {
    elem.msRequestFullscreen();
  } else if (elem.mozRequestFullScreen) {
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) {
    elem.webkitRequestFullscreen();
  }
}

// create and edit product pages
// add multiple video fileds and remove theme
$('#AddMoreProductVideos').click(function(){
        var morevide = '<div class="input-group videolist" style="margin-bottom: 15px"><span class="input-group-addon"><i class="icon-youtube"></i></span><input type="text" name="videos[]" class="form-control" placeholder="youtube link"><a><i class="icon-close2"></i></a></div>';  
        $( morevide ).insertBefore(this);
});

$('body').on('click', '.videolist .icon-close2' ,function(){
    $(this).closest('.videolist').remove();
});
$('body #show_search_box').click(function(){
  $('#search_box').toggle();
});