<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;


class ProductsCategoriesController extends Controller
{


public $langs = ['ar' => 'العربية' ,'en'  => 'English' ,'de'  => 'Deutsch' ,'tr'  => 'Turkish'];    
    
    public function index() {
         $categories = ProductCategories::Merchant()->orderby('id','desc')->paginate(10);
         return view('admin.products.categories.index',compact('categories'));
    }


    public function store(Request $request) {        

        $rules = [
          'name'            => 'required', 
          'slug'      => 'required',
        ];

        $messages = [
            'name.required'      => trans("name.required"),
            'slug.required'      => trans("slug.required"),
        ];

       // $request->validate($rules,$messages);
        $content       = new ProductCategories ;

        foreach ($this->langs  as $key => $value) {

            $name = 'name_'.$key;

            if($request->filled($name)){
                $content->setTranslation('name', $key, $request->$name);
            }
            
        }

        $content->slug =  $request->slug;


        if($request->hasFile('image')){
            $content->image  =  $request->image->store('products',['disk' => 'public']);     
        }
        
        $content->store_id   =  $request->user()->store_id;
        $content->lang       =  \App::getLocale();
        $content->save();

        return redirect()->route('admin.products.categories.home')->with('success',trans('productCat.created'));
    }


    public function edit($id) {
        $content = ProductCategories::find($id);
        return view('admin.products.categories.edit',compact('content'));
    }

   
    public function update(Request $request, $id) {
        
        $ProductCategories       = ProductCategories::find($id);

        foreach ($this->langs  as $key => $value) {

            $name = 'name_'.$key;

            if($request->filled($name)){
                $ProductCategories->setTranslation('name', $key, $request->$name);
            }
        }


        $ProductCategories->slug=$request->link;

        if($request->hasFile('image')){
            $ProductCategories->image  =  $request->image->store('products',['disk' => 'public']);     
        }
        
        $ProductCategories->save();
        return redirect()->route('admin.products.categories.home')->with('success',trans('productCat.updated'));
   }

  
    public function delete($id) {
        $content= ProductCategories::find($id);
        $content->delete();
        return redirect()->route('admin.products.categories.home')->with('success',trans('productCat.deleted'));
    }

    



}
