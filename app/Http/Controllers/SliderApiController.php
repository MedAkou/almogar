<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SliderApiController extends Controller
{

    /**
     * Get merchant sliders.
     * 
     * @return JsonResponse
     */
    public function index(){
        return new JsonResponse([
            'sliders' => Slider::Merchant()->get()
        ]);
    }

    /**
     * Get merchant slider which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function details($id){
        return new JsonResponse([
            'slider' => Slider::find($id)
        ]);
    }

    /**
     * Store slider.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        $slider = new Slider ;

        if($request->hasFile('image')){
            $slider->image  =  $request->image->store('sliders',['disk' => 'public']);     
        }
        
        $slider->link     =  $request->link;
        $slider->store_id =  $request->user()->store_id;
        $slider->lang     =  \App::getLocale();
        $slider->save();
        
        return new JsonResponse([
            'status' => 'success',
            'message' => 'Slider created successfully'
        ]);
    }

    /**
     * Update slider which id = $id
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        $slider = Slider::find($id);
        
        if($request->hasFile('image')){
            $slider->image = $request->image->store('sliders',['disk' => 'public']);     
        }
        
        $slider->link = $request->link;
        $slider->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Slider updated successfully'
        ]);
    }

    /**
     * Delete slider which id = $id
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id){
        Slider::find($id)->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Slider deleted successfully'
        ]);
    }

    /**
     * Duplicate slider which id = $id
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function duplicate($id){
        Slider::find($id)->replicate()->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Slider duplicated successfully'
        ]);
    }
}
