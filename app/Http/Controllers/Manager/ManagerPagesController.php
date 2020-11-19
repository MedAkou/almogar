<?php

namespace App\Http\Controllers\Manager;
use \App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\BasePages;


class ManagerPagesController extends Controller {
    

    
    public function index() {
        $pages = BasePages::Lang()->orderby('id','desc')->paginate(10);
        return view('manager.pages.index',compact('pages'));    
    }

    public function bulkdelete() {
         BasePages::truncate();
        return redirect()->route('manager.pages.home')->with('success','data has been deleted successfully');
    }

 
    public function home() {
        return view('manager.statique.home');
    }    
    
    public function create() {
        return view('manager.pages.create');
    }

    public function store(Request $request) {
    

        $rules = [
          'title'            => 'required', 
          'content'      => 'required',
        ];

        $messages = [
            'title.required'        => trans("title.required"),
            'content.required'      => trans("content.required"),
        ];

        $request->validate($rules,$messages);
        
        $content           =  new BasePages ;
        $content->title    =  $request->title;
        $content->content  =  $request->content;
        $content->slug     =  str_slug($request->title);
        $content->store_id =  $request->user()->store_id;
        $content->lang     =  \App::getLocale();

        $content->save(); 

        return redirect()->route('manager.pages.home')->with('success',trans("pages.created"));

    }


    public function edit($id) {
        $content = BasePages::find($id);
        return view('manager.pages.edit',compact('content'));
    }
    
    public function update(Request $request, $id) {
        
        $content = BasePages::find($id);
       
        $rules = [
          'title'            => 'required', 
          'content'      => 'required',
        ];

        $messages = [
            'title.required'        => trans("title.required"),
            'content.required'      => trans("content.required"),
        ];

        $request->validate($rules,$messages);

        $content->title    =  $request->title;
        $content->content  =  $request->content;
        $content->slug     =  str_slug($request->title);
        
        $content->save(); 

        return redirect()->route('manager.pages.home')->with('success',trans("pages.updated"));
    }

    
    public function duplicate($id) {
       $content = BasePages::find($id);
       $new = $content->replicate();
       $new->save();
       return redirect()->route('manager.pages.home')->with('success',trans("pages.duplicated"));
    }

    public function delete($id) {
        $content= BasePages::find($id);
        $content->delete();
        return redirect()->route('manager.pages.home')->with('success',trans("pages.deleted"));
    }


}
