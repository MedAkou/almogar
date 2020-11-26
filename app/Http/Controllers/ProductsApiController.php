<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    /**
     * Get all products.
     * 
     * @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse([
            'products' => Product::get()
        ]);
    }

    /**
     * Get product by its id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function details($id){
        return new JsonResponse([
            'product' => Product::find($id)
        ]);
    }

    /**
     * Store product.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        $content = new Product;
        ProductHelper::save($content,$request);
        
        return new JsonResponse([
            'status' => 'success',
            'message' => 'Product created successfully'
        ]);
    }

    /**
     * Edit product whose id = $id.
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        $content = Product::find($id);
        ProductHelper::save($content,$request);

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Product updated successfully'
        ]);
    }

    /**
     * Delete product whose id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id){
        $product = Product::find($id);
        if($product){
            ProductHelper::clean($product);
            $product->delete();
        }

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Product deleted successfully'
        ]);
    }

    /**
     * Activate product whose id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function activate($id){
        $product = Product::find($id);
        $product->active = 1;
        $product->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Product activated successfully'
        ]);
    }

    /**
     * Deactivate product whose id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function deactivate($id){
        $product = Product::find($id);
        $product->active = 0;
        $product->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Product deactivated successfully'
        ]);
    }

    public function search(Request $request){
        $store          = \Auth::user()->store_id;

        $categories = ProductCategories::where('store_id',$store)->get();
        $active         = Product::where('store_id',$store)
                                    ->where('active', '1')
                                    ->count();
        $not_active     = Product::where('store_id',$store)
                                    ->where('active', '0')
                                    ->orwhereNull('active')
                                    ->where('store_id',$store)
                                    ->count();
        $q          = $request->q;
        $lang       = \App::getLocale();
        $products   = Product::where('store_id',$store)
                                ->where('name->'.$lang,'LIKE','%' . $q . '%')
                                ->paginate(10);
        $count      = $products->count();

        return new JsonResponse([
            'products' => $products,
            'categories' => $categories,
            'count' => $count,
            'active' => $active,
            'not_active' => $not_active
        ]);
    }
}
