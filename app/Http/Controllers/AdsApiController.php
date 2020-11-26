<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdsApiController extends Controller
{
    /**
     * Get merchant ads which lang as auth lang.
     * 
     * @return JsonResponse
     */
    public function index(){
        return new JsonResponse([
            'ads' => Ads::Merchant()->Lang()->get()
        ]);
    }

    /**
     * Get ads which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function details($id){
        return new JsonResponse([
            'ads' => Ads::find($id)
        ]);
    }

    /**
     * Store ad.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        $ads             =  new Ads ;
        $ads->statue     =  $request->statue;
        $ads->name       =  $request->name;
        $ads->url        =  $request->link;
        $ads->image      =  $request->image;
        $ads->htmlcode   =  $request->codehtml;
        $ads->area       =  $request->area;
        $ads->date_start =  $request->date_start;
        $ads->date_end   =  $request->date_end;
        $ads->store_id   =  $request->user()->store_id;
        $ads->lang       =  \App::getLocale();
    
        $ads->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Ad created successfully'
        ]);
    }

    /**
     * Update ad which id = $id.
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        $ads             =  Ads::find($id) ;
        $ads->statue     =  $request->statue;
        $ads->name       =  $request->name;
        $ads->url        =  $request->link;
        $ads->image      =  $request->image;
        $ads->htmlcode   =  $request->codehtml;
        $ads->area       =  $request->area;
        $ads->date_start =  $request->date_start;
        $ads->date_end   =  $request->date_end;
        // $ads->store_id   =  $request->user()->store_id;
        $ads->lang       =  \App::getLocale();
    
        $ads->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Ad updated successfully'
        ]);
    }

    /**
     * Delete ad which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id){
        Ads::find($id)->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Ad deleted successfully'
        ]);
    }

    /**
     * Duplicate ad which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function duplicate($id){
        Ads::find($id)->replicate()->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Ad duplicated successfully'
        ]);
    }
}
