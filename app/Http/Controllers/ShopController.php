<?php

namespace App\Http\Controllers;

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
            $product = Product::where('slug',$id)->first();
        }
        
        $related = Product::where('categoryID', $product->categoryID)->take(7)->get();

        if(!$related) {
            $related = Product::all()->random(7);;
        }

        return view($this->theme.'product',compact('product','related','reviews','wishlist'));     
    }

    public function quickview($store,$id) {

        if(is_numeric($id)){
            $product = Product::find($id);
        }
        else {
            $product = Product::where('slug',$id)->first();
        }
        
        $related = Product::where('categoryID', $product->categoryID)->get();

        if(!$related) {
            $related = Product::all()->random(7);;
        }

        return view($this->theme.'elements.quickview',compact('product','related','reviews','wishlist'));     
    }

}
