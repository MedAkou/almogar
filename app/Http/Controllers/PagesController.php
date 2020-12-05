<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Page;
use App;
use App\Models\Product;
use App\Models\ProductCategories;

class PagesController extends Controller {
    

    
    public function index() {
        $pages = Page::Lang()->Merchant()->orderby('id','desc')->paginate(10);
        return view('admin.pages.index',compact('pages'));    
    }

    public function bulkdelete() {
         Page::truncate();
        return redirect()->route('admin.pages.home')->with('success','data has been deleted successfully');
    }

 
    public function home() {
        return view('admin.statique.home');
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

        $content           = new Page ;
        $content->title    =  $request->title;
        $content->content  =  $request->content;
        $content->slug     =  str_slug($request->title);
        $content->store_id =  $request->user()->store_id;
        $content->lang     =  App::getLocale();

        $content->save(); 

        return redirect()->route('admin.pages.home')->with('success',trans("pages.created"));

    }


    public function edit($id) {
        $content = page::find($id);
        return view('admin.pages.edit',compact('content'));
    }
    
    public function update(Request $request, $id) {
        
        $content = Page::find($id);
       
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

        return redirect()->route('admin.pages.home')->with('success',trans("pages.updated"));
    }

    
    public function duplicate($id) {
       $content = Page::find($id);
       $new = $content->replicate();
       $new->save();
       return redirect()->route('admin.pages.home')->with('success',trans("pages.duplicated"));
    }

    public function delete($id) {
        $content= Page::find($id);
        $content->delete();
        return redirect()->route('admin.pages.home')->with('success',trans("pages.deleted"));
    }

    public function assigntocategorie(Request $request){
        $ids = explode(',',$request->AssignToProductIDS) ?? [];
         $categoryID = $request->category_id;


         if($categoryID){
         $products =  Product::whereIn('id', $ids)->get();
              if($products->count() > 0  ) {
                        foreach($products as $product){
                            $product->categoryID = $categoryID;
                            $product->save();
                        }
              }
        }

        
        
        return redirect()->back()->with('success','categories_updated');
    }

    public function deleteproducts(Request $request){
        $ids = explode(',',$request->AssignToDelete) ?? [];

         $products =  Product::whereIn('id', $ids)->get();
              if($products->count() > 0  ) {
                        foreach($products as $product){
                            $product->delete();
                        }
              }
        
        return redirect()->route('admin.products.home')->with('success','products_deleted');
    }

}
