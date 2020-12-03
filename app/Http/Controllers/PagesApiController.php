<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PagesApiController extends Controller
{
    /**
     * Get pages whose lang same as merchant lang.
     * 
     * @return JsonResponse 
     */
    public function index(){
        return new JsonResponse([
            'pages' => Page::Lang()->Merchant()->get()
        ]);
    }

    /**
     * Get page which id = $id.
     * 
     * @param int $id
     * @return JsonResponse 
     */
    public function details($id){
        return new JsonResponse([
            'page' => Page::find($id)
        ]);
    }

    /**
     * Store page.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        $page           =  new Page;
        $page->title    =  $request->title;
        $page->content  =  $request->content;
        $page->slug     =  str_slug($request->title);
        $page->store_id =  $request->user()->store_id;
        $page->lang     =  \App::getLocale();

        $page->save();
        
        return new JsonResponse([
            'status' => 'success',
            'message' => 'Page created successfully'
        ]);
    }

    /**
     * Update page whose id = $id.
     * 
     * @param Request $request
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        $page = Page::find($id);

        $page->title    =  $request->title;
        $page->content  =  $request->content;
        $page->slug     =  str_slug($request->title);
        
        $page->save(); 

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Page updated successfully'
        ]);
    }

    /**
     * Delete page whose id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id){
        Page::find($id)->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Page deleted successfully'
        ]);

    }

    /**
     * Duplicate page whose id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function duplicate($id){
        Page::find($id)->replicate()->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Page duplicated successfully'
        ]);
    }
}
