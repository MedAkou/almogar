<?php

namespace App\Http\Controllers\Manager;
use \App\Http\Controllers\Controller;

use App\Models\AdsManager;
use Illuminate\Http\Request;
use App;


class ManagerAdsController extends Controller{

    public function bulkdelete() {
        AdsManager::truncate();
        return redirect()->route('manager.ads.home')->with('success',trans('ads.bulkDelete'));
    }


    public function index() {
        $ads = AdsManager::Lang()->orderby('id','desc')->paginate(10);
        return view('manager.ads.index',compact('ads'));   
    } 

    public function create() {
        return view('manager.ads.create');
    }

   
    public function store(Request $request) {
        $content = new AdsManager ;
      
        $content->statue     =  $request->active ;
        $content->name       =  $request->name;
        $content->url        =  $request->link;
        $content->image      =  $request->image;
        $content->htmlcode   =  $request->codehtml;
        $content->area       =  $request->area ;    
        $content->lang       =  App::getLocale();

        if($request->hasFile('image')){
            $content->image  = $request->image->store('media',['disk' => 'public']);     
        }

        $content->save();  
        return redirect()->route('manager.ads.home')->with('success',trans('ads.created'));  
    }

  
    public function duplicate($id) {
        $content = AdsManager::find($id);
        $new     = $content->replicate();
        $new->save();
       return redirect()->route('manager.ads.home')->with('success',trans('ads.duplicated'));
    }

    
    public function edit($id) {
        $content = AdsManager::find($id);
        return view('manager.ads.edit',compact('content'));
    }

    
    public function update(Request $request, $id) {
        
        $ads           =  AdsManager::find($id);
        
        $ads->statue   =  $request->active;
        $ads->name     =  $request->name;
        $ads->url      =  $request->url;
        $ads->image    =  $request->image;
        $ads->htmlcode =  $request->htmlcode;
        $ads->area     =  $request->area ;

        $ads->save();
        return redirect()->route('manager.ads.home')->with('success',trans('ads.updated'));
    }

    
    public function delete($id) {
        $content= AdsManager::find($id);
        $content->delete();
        return redirect()->route('manager.ads.home')->with('success',trans('ads.deleted'));
    }


}
