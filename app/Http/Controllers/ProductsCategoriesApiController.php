<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsCategoriesApiController extends Controller
{

    /**
     * @var $langs
     */
    public $langs = ['ar' => 'العربية' ,'en'  => 'English' ,'de'  => 'Deutsch' ,'tr'  => 'Turkish'];    

    /**
     * Get all products categories.
     * 
     * @return JsonResponse
     */
    public function index(){
        return new JsonResponse([
            'productCategories' => ProductCategories::Merchant()->get()
        ]);
    }

    /**
     * Get product category which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function details($id){
        return new JsonResponse([
            'productCategory' => ProductCategories::find($id)
        ]);
    }

    /**
     * Store product category.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        $productCategory       = new ProductCategories ;

        foreach ($this->langs  as $key => $value) {
            $name = 'name_'.$key;
            if($request->filled($name)){
                $productCategory->setTranslation('name', $key, $request->$name);
            }
            
        }
        $productCategory->slug =  $request->slug;

        if($request->hasFile('image')){
            $productCategory->image  =  $request->image->store('products',['disk' => 'public']);     
        }
        
        $productCategory->store_id   =  $request->user()->store_id;
        $productCategory->lang       =  \App::getLocale();
        $productCategory->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Product category created successfully'
        ]);
    }

    /**
     * Update product category whose id = $id.
     * 
     * @param Request $request
     * @param int $id
     * 
     * @return JsonResponse 
     */
    public function update(Request $request, $id){
        $ProductCategories = ProductCategories::find($id);

        foreach ($this->langs  as $key => $value) {
            $name = 'name_'.$key;
            if($request->filled($name)){
                $ProductCategories->setTranslation('name', $key, $request->$name);
            }
        }

        $ProductCategories->slug = $request->link;

        if($request->hasFile('image')){
            $ProductCategories->image  =  $request->image->store('products',['disk' => 'public']);     
        }
        
        $ProductCategories->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Product category updated successfully'
        ]);
    }


    /**
     * Delete product category.
     * 
     * @param int $id
     * @return JsonReponse
     */
    public function delete($id){
        ProductCategories::find($id)->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Product category deleted successfully'
        ]);
    }
}
