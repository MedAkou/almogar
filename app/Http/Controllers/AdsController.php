<?php

namespace App\Http\Controllers;
use App\Models\Ads;
use Illuminate\Http\Request;
use App;

class AdsController extends Controller {
  
    public function bulkdelete() {
        Ads::Merchant()->Lang()->truncate();
        return redirect()->route('admin.ads.home')->with('success',trans('ads.bulkDelete'));
    }

    public function index() {
        $ads = Ads::Merchant()->Lang()->orderby('id','desc')->paginate(10);
        return view('admin.ads.index',compact('ads'));   
    }


    public function store(Request $request) {
        $content             =  new Ads ;
        $content->statue     =  $request->active;
        $content->name       =  $request->name;
        $content->url        =  $request->link;
        $content->image      =  $request->image;
        $content->htmlcode   =  $request->codehtml;
        $content->area       =  $request->area;
        $content->store_id   =  $request->user()->store_id;
        $content->lang       =  App::getLocale();
    
        $content->save();  
        return redirect()->route('admin.ads.home')->with('success',trans('ads.created'));

    }

    public function duplicate($id) {
        $content = Ads::find($id);
        $new = $content->replicate();
        $new->save();
       return redirect()->route('admin.ads.home')->with('success',trans('ads.duplicated'));
    }

  
    public function edit($id) {
        $content = Ads::find($id);
        return view('admin.ads.edit',compact('content'));
    }

    public function update(Request $request, $id) {

        $ads                 =  Ads::find($id);
        $content->statue     =  $request->active;
        $content->name       =  $request->name;
        $content->url        =  $request->link;
        $content->image      =  $request->image;
        $content->htmlcode   =  $request->codehtml;
        $content->area       =  $request->area;
        
        $ads->save();
        return redirect()->route('admin.ads.home')->with('success',trans('ads.updated'));

    }

    public function delete($id) {
        $content   = Ads::find($id);
        $content->delete();
        return redirect()->route('admin.ads.home')->with('success',trans('ads.deleted'));
    }

}
