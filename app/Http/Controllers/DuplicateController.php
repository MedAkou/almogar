<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Product,Stores,Page,Options,Menus,User,ProductCategories,Slider};
use Illuminate\Support\Str;
use Auth;
use Hash;

class DuplicateController extends Controller
{

    public $userId;
    public $storeId;
    public $getStoreId;

    public function jahnama($id){
        $this->createNewUser($id);
        $this->createNewStore($id);
        $this->assignUserToStore();
        $this->duplicateProducts($id);
        $this->assignCategoriesToProducts($id);
        $this->duplicatePages($id);
        $this->duplicateOptions($id);
        $this->duplicateMenus($id);
        $this->duplicateSliders($id);

        return redirect()->back();
    }
    
    public function index()
    {
        //
    }

    
    public function createNewUser($id)
    {
        $store = Stores::find($id);
        $iduser = $store->user_id;
        $user = User::find($iduser);
        $newUser = $user->replicate();
        $newUser->email = Str::random(5).'@o-bazaar.com';
        $newUser->password = Hash::make('1234');
        $newUser->save();

        $this->userId = $newUser->id;
    }

    public function createNewStore($id){

        $store = Stores::find($id);
        $newStore = $store->replicate();
        $newStore->user_id = $this->userId;
        $newStore->slug = Str::random(6);
        $newStore->save();

        $this->storeId = $newStore->id;
    }

    public function assignUserToStore(){

        $user = User::find($this->userId);
        $user->store_id = $this->storeId;
        $user->save();
    }

    public function duplicateProducts($id){
        // get all the products of the store where category is null
        $Products = Product::where('store_id',$id)->whereNull('categoryID')->get();

        // foreach product as product
        // duplicate product
        // change product store_id &
        foreach ($Products as $product) {
            $newProducts = $product->replicate();
            $newProducts->store_id = $this->storeId;
            $newProducts->save();
        }
    }

    /*public function duplicateProductCategories($id){
        // get all the products of the store
        $Categories = ProductCategories::where('store_id',$id)->get();

        // foreach product as product
        // duplicate product
        // change product store_id &

        foreach ($Categories as $categorie) {
            $newcategories = $categorie->replicate();
            $newcategories->store_id = $this->storeId;
            $newcategories->save();
        }
    }*/

    public function assignCategoriesToProducts($id){
        

        //get all products categories from the old store
        $Categories = ProductCategories::where('store_id',$id)->get();

        //foreach productsCategories as item
        foreach ($Categories as $item ) {
            //duplicate item & save the id + stoteId
            $newcategories = $item->replicate();
            $newcategories->store_id = $this->storeId;
            $newcategories->save();

            //get products where categoriyID == item Id
            $Products = Product::where('store_id',$id)->where('categoryID',$item->id)->get();

            //foreach products as product
            foreach ($Products as $product) {   
                $newProduct = $product->replicate();             
                $newProduct->store_id = $this->storeId;
                $newProduct->categoryID = $newcategories->id;
                $newProduct->save();
                //dd($newcategories->id,$this->storeId,$newProduct->toArray());
            }
        }
        
    }


    public function duplicatePages($id){
        // get all the products of the store
        $Pages = Page::where('store_id',$id)->get();

        // foreach product as product
        // duplicate product
        // change product store_id &
        foreach ($Pages as $pages) {
            $newpages = $pages->replicate();
            $newpages->store_id = $this->storeId;
            $newpages->save();
        }
    }

    public function duplicateOptions($id){
        // get all the products of the store
        $options = Options::where('store_id',$id)->get();

        // foreach product as product
        // duplicate product
        // change product store_id &
        foreach ($options as $option) {
            $newoption = $option->replicate();
            $newoption->store_id = $this->storeId;
            $newoption->save();
        }
    }

    public function duplicateMenus($id){
        // get all the products of the store
        $menus = Menus::where('store_id',$id)->get();

        // foreach product as product
        // duplicate product
        // change product store_id &
        foreach ($menus as $menu) {
            $newmenu = $menu->replicate();
            $newmenu->store_id = $this->storeId;
            $newmenu->save();
        }
    }

    
    public function duplicateSliders($id)
    {
        $sliders = Slider::where('store_id',$id)->get();
        
        foreach ($sliders as $slider) {
            $newslider = $slider->replicate();
            $newslider->store_id = $this->storeId;
            $newslider->save();
        }
    }

    
}
