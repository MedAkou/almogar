<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use App\Models\FileManager;
use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller {

    
    public function index() {
        $products = Product::Merchant()->paginate(12);
        return view ($this->theme.'shop',compact('products'));
    }

    public function product($store,$id) {
        if(is_numeric($id)){
            $product = Product::find($id);
        }
        else {
            $langs = ProductHelper::$langs;
            $lang = \App::getLocale();
            $product = Product::where('slug->'.$lang, $id)->first();
            if(!$product){
                foreach($langs as $key => $lang){
                    if($product = Product::where('slug->'.$key, $id)->first()) break;
                }
            }
        }

        $related = Product::where('categoryID', $product->categoryID)->take(7)->get();

        if(!$related) {
            $related = Product::all()->random(7);
        }
        return view($this->theme.'product',compact('product','related','reviews','wishlist'));     
    }

    public function quickview($store,$id) {

        if(is_numeric($id)){
            $product = Product::find($id);
        }
        else {
            $lang = \App::getLocale();
            $product = Product::where('slug->'.$lang, $id)->first();
        }
        
        $related = Product::where('categoryID', $product->categoryID)->get();

        if(!$related) {
            $related = Product::all()->random(7);;
        }

        return view($this->theme.'elements.quickview',compact('product','related','reviews','wishlist'));     
    }

}
