<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrdersApiController extends Controller
{
    /**
     * Get all orders.
     */
    public function index(){
        return new JsonResponse([
            'orders' => Orders::get()
        ]);
    }

    /**
     * Get order by $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function details($id){
        return new JsonResponse([
            'order' => Orders::find($id)
        ]);
    }

    /**
     * Get order of user whose id = $user_id
     * 
     * @param int $user_id
     * @return JsonResponse
     */
    public function userOrder($user_id){
        return new JsonResponse([
            'orders' => Orders::where('user_id', $user_id)->get()
        ]);
    }

    /**
     * Store product.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){

    }

    /**
     * Change statue of order whose id = $id.
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function changeStatue(Request $request, $id){
        $order = Orders::find($id);
        $order->statue = $request->statue;
        $order->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Order updated successfully'
        ]);
    }

    /**
     * Delete order whose id = $id
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id){
        $order = Orders::find($id);
        $order->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Order deleted successfully'
        ]);
    }
}
