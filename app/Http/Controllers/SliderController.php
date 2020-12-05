<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Slider};
use App;


class SliderController extends Controller {


    public function index() {
        $sliders = Slider::Merchant()->orderby('id','desc')->paginate(10);
        return view('admin.slider.index',compact('sliders'));
    }


    public function truncate(){
        Slider::Merchant()->Lang()->truncate();
        return redirect()->route('admin.slider.home')->with('success',trans('slider.bulkDelete'));
    }


    public function store(Request $request) {

        
        $rules = [
          'link' => 'required', 
          'image' => 'required',
        ];

        $messages = [
            'link.required'       => trans('slider.link.required') ,
            'image.required'      => trans('slider.image.required') ,
        ];

        $request->validate($rules,$messages);

        
        $content = new Slider ;

        if($request->hasFile('image')){
            $content->image  =  $request->image->store('sliders',['disk' => 'public']);     
        }
        
        $content->link     =  $request->link;
        $content->store_id =  $request->user()->store_id;
        $content->lang     =  App::getLocale();
        $content->save();  
        return redirect()->route('admin.slider.home')->with('success',trans('slider.created'));
    }
   
 
    public function edit($id) {
        $content = Slider::find($id);
        return view('admin.slider.edit',compact('content'));
    }

   
    public function update(Request $request, $id) {
        $content= Slider::find($id);
        
        if($request->hasFile('image')){
            $content->image  =  $request->image->store('sliders',['disk' => 'public']);     
        }
        
        $content->link=  $request->link;
        $content->save();  
        return redirect()->route('admin.slider.home')->with('success',trans('slider.updated'));
    }


    public function duplicate($id) {
        $content = Slider::find($id);
        $new     = $content->replicate();
        $new->save();
        return redirect()->route('admin.slider.home')->with('success',trans('slider.duplicated'));
    }


    public function delete($id) {
        $content= Slider::find($id);
        $content->delete();
        return redirect()->route('admin.slider.home')->with('success',trans('slider.deleted'));
    }



}
