<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Menus,ProductCategories};
class MenusController extends Controller {
    



    public function index() {
        $menus      = Menus::Lang()->Merchant()->get();   
        $categories = ProductCategories::Lang()->Merchant()->get();   
        $menu       = Menus::Lang()->Merchant()->get()->last();  
        
        if(!is_null($menu)) {
            $htmlMenu   = json_decode($menu->menu, true);    
        }else {
            $htmlMenu   = '';    
        }
        
        return view ('admin.menus.index',compact('menus','menu','categories','htmlMenu'));
    }


    public function store(Request $request) {
        $content           = new Menus ;
        $content->name     =  $request->name;
        $content->store_id =  $request->user()->store_id;
        $content->lang     =  \App::getLocale();
        $content->save();  
        return redirect()->route('admin.menus.home')->with('success',trans('menu.created'));  
    }



    public function edit ($id) {
        $menus      = Menus::Lang()->Merchant()->get();   
        $categories = ProductCategories::Lang()->Merchant()->get();   
        $menu       = Menus::find($id);  
        
        if(!is_null($menu)) {
            $htmlMenu   = json_decode($menu->menu, true);    
        }else {
            $htmlMenu   = '';    
        }
        
        return view ('admin.menus.index',compact('menus','menu','categories','htmlMenu')); 
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

        $menu = Menus::find($request->menu_id);
        $menu->menu = $menuJson;

        if($menu->area != $request->area){
            $update =Menus::Lang()->Merchant()->where('area',$request->area)->first();
            if($update){
                $update->area = NULL;
                $update->save();
            }
        }
        
        $menu->area = $request->area;
        $menu->save();  

        return redirect()->route('admin.menus.home')->with('success',trans('menu.updated'));   

    }


 
     public function delete($id) {
         $menu = Menus::find($id);
         $menu->delete();
         return redirect()->route('admin.menus.home')->with('success',trans('menu.deleted'));   
     }



}
