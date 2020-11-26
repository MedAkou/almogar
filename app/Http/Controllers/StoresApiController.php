<?php

namespace App\Http\Controllers;

use App\Helpers\StoresHelper;
use App\Models\Stores;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoresApiController extends Controller
{

    /**
     * Get all stores.
     * 
     * @return JsonResponse
     */
    public function index(){
        return new JsonResponse([
            'stores' => Stores::get()
        ]);
    }

    /**
     * Get store which id = $id
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function details($id){
        return new JsonResponse([
            'store' => Stores::find($id)
        ]);
    }

    /**
     * Store store.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        StoresHelper::save($request);

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Store created successfully'
        ]);
    }

    /**
     * Update store which id = $id.
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        StoresHelper::update($request,$id);

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Store updated successfully'
        ]);
    }

    /**
     * Delete store which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id){
        $store = Stores::find($id);

        // remove the user from the store
        
        $owner = User::find($store->user_id);
        if($owner){
            $owner->store_id = NULL;
            $owner->save();
        }

        $store->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Store deleted successfully'
        ]);
    }
}
