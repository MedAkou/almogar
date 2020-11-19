<?php

namespace App\Http\Controllers\Manager;
use \App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Orders;

class ManagerOrdersController extends Controller
{


    public function bulkdelete() {
         Orders::truncate();
        return redirect()->route('manager.orders.home')->with('success','data has been deleted successfully');
    }


    public function index() {


    $stores = \App\Models\Stores::all('name','id')->toArray();

    if(isset($_GET['order_id'])){
    $orders = Orders::where('serial',$_GET['order_id'])->paginate(10);

    }else 
    if(isset($_GET['store_id'])){
        $orders = Orders::where('store_id',$_GET['store_id'])->paginate(10);
    }
        else{

        $orders = Orders::orderby('id','desc')->paginate(10);
    }
        return view('manager.orders.index',compact('orders','stores'));
    }

 
    public function edit($id) {
        $content = Orders::find($id);
        return view('manager.orders.edit',compact('content'));
    }

 
    public function delete($id){
        $order = Orders::find($id);
        if($order ){
            $order->delete();
        }
        return redirect()->route('manager.orders.home')->with('success',trans('order.deleted'));
    }


}
