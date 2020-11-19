<?php

namespace App\Http\Controllers\Manager;
use \App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\{BaseMenus,ProductCategories};


class ManagerMenusController extends Controller {
    



    public function index() {
        $menus      = BaseMenus::Lang()->get();   
        $categories = ProductCategories::Lang()->get();   
        $menu       = BaseMenus::Lang()->get()->last();  
        
        if(!is_null($menu)) {
            $htmlMenu   = json_decode($menu->menu, true);    
        }else {
            $htmlMenu   = '';    
        }
        

        return view ('manager.menus.index',compact('menus','menu','categories','htmlMenu'));
    }


    public function store(Request $request) {
        $content           = new BaseMenus ;
        $content->name     =  $request->name;
        $content->lang     =  \App::getLocale();
        $content->save();  
        return redirect()->route('manager.menus.home')->with('success',trans('menu.created'));  
    }



    public function edit ($id) {
        $menus      = BaseMenus::Lang()->get();   
        $categories = ProductCategories::Lang()->get();   
        $menu       = BaseMenus::find($id);  
        
        if(!is_null($menu)) {
            $htmlMenu   = json_decode($menu->menu, true);    
        }else {
            $htmlMenu   = '';    
        }
        
        return view ('manager.menus.index',compact('menus','menu','categories','htmlMenu')); 
    }

    
    public function update(Request $request) { 

        $menuArray = json_decode($request->menu_json, TRUE);

        $optimized = [];

        for($x=0;$x<count($menuArray);$x++) {
            
            if($menuArray[$x]['deleted'] == '0' ){

                $menuArray[$x]['id'] = rand(0,4500);  
                $menuArray[$x]['new'] = 0;  
                
                $optimized[$x] = $menuArray[$x];

                if(isset($menuArray[$x]['children'])) {

                    $subMenu = [];

                    for($v=0;$v<count($menuArray[$x]['children']);$v++):

                            $menuArray[$x]['children'][$v]['id'] = rand(0,4500);  
                            $menuArray[$x]['children'][$v]['new'] = 0;  
                    
                    $subMenu[] = $menuArray[$x]['children'][$v];
                    
                    endfor;

                    $optimized[$x]['children'] = $subMenu;
                }
            }
        } 

        $menuJson = json_encode( $optimized , JSON_UNESCAPED_UNICODE );

        $menu = BaseMenus::find($request->menu_id);
        $menu->menu = $menuJson;
        $menu->name = $request->name;

        if($menu->area != $request->area){
            $update = BaseMenus::Lang()->where('area',$request->area)->first();
            if($update){
                $update->area = NULL;
                $update->save();
            }
        }
        
        $menu->area = $request->area;
        
        $menu->save();  

        return redirect()->route('manager.menus.home')->with('success',trans('menu.updated'));   

    }


 
     public function delete($id) {
         $menu = BaseMenus::find($id);
         $menu->delete();
         return redirect()->route('manager.menus.home')->with('success',trans('menu.deleted'));   
     }



}
