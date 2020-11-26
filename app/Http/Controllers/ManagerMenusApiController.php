<?php

namespace App\Http\Controllers;

use App\Models\BaseMenus;
use App\Models\ProductCategories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ManagerMenusApiController extends Controller
{
    /**
     * Get Basemenus which lang same as auth lang,
     * Get productCategories which lang as auth lang,
     * Get last BaseMenu which lang as auth lang
     * 
     * @return JsonResponse
     */
    public function index(){
        $menus      = BaseMenus::Lang()->get();   
        $categories = ProductCategories::Lang()->get();   
        $menu       = BaseMenus::Lang()->get()->last();  
        
        if(!is_null($menu)) {
            $htmlMenu   = json_decode($menu->menu, true);    
        }else {
            $htmlMenu   = '';    
        }

        return new JsonResponse([
            'menus' => $menus,
            'categories' => $categories,
            'menu' => $menu,
            'htmlMenu' => $htmlMenu
        ]);
    }

    /**
     * Get Basemenus which lang same as auth lang,
     * Get productCategories which lang as auth lang,
     * Get last BaseMenu which lang as auth lang
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function details($id){
        return new JsonResponse([
            'menu' => BaseMenus::find($id)
        ]);
    }

    /**
     * Store BaseMenu.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        $menus           =  new BaseMenus ;
        $menus->name     =  $request->name;
        $menus->menu     =  $request->menu;
        $menus->area     =  $request->area;
        $menus->lang     =  \App::getLocale();
        $menus->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Menu created successfully'
        ]);
    }

    /**
     * Update BaseMenu which id = $id.
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        $menu           =  BaseMenus::find($id);
        $menu->name     =  $request->name;
        $menu->menu     =  $request->menu;
        $menu->area     =  $request->area;
        $menu->lang     =  \App::getLocale();
        
        $menu->save(); 

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Menu updated successfully'
        ]);
    }

    /**
     * Delete BaseMenu whide id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id){
        BaseMenus::find($id)->delete(); 

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Menu deleted successfully'
        ]);
    }
}
