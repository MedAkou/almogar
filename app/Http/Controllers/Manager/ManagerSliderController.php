<?php

namespace App\Http\Controllers\Manager;
use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlider;

class ManagerSliderController extends Controller {


    public function index() {
        $sliders = HomeSlider::orderby('id','desc')->paginate(10);
        return view('manager.slider.index',compact('sliders'));
    }


    public function create() {
        return view('manager.slider.create');
    }


    public function truncate(){
        HomeSlider::Lang()->truncate();
        return redirect()->route('manager.slider.home')->with('success',trans('slider.bulkDelete'));
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

        $content = new HomeSlider ;

        if($request->hasFile('image')){
            $content->image  =  $request->image->store('sliders',['disk' => 'public']);     
        }
        
        $content->link =  $request->link;
        $content->lang           =  \App::getLocale();
        $content->save();  
        return redirect()->route('manager.slider.home')->with('success',trans('slider.created'));
    }
   
 
    public function edit($id) {
        $content= HomeSlider::find($id);
        return view('manager.slider.edit',compact('content'));
    }

   
    public function update(Request $request, $id) {
        $content= HomeSlider::find($id);
        
        if($request->hasFile('image')){
            $content->image  =  $request->image->store('sliders',['disk' => 'public']);     
        }
        
        $content->link=  $request->link;
        $content->save();  
        return redirect()->route('manager.slider.home')->with('success',trans('slider.updated'));
    }


    public function duplicate($id) {
        $content = HomeSlider::find($id);
        $new = $content->replicate();
        $new->save();
        return redirect()->route('manager.slider.home')->with('success',trans('slider.duplicated'));
    }


    public function delete($id) {
        $content= HomeSlider::find($id);
        $content->delete();
        return redirect()->route('manager.slider.home')->with('success',trans('slider.deleted'));
    }



}
