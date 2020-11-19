<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class OrdersController extends Controller {


    public function bulkdelete() {
         Orders::truncate();
        return redirect()->route('admin.orders.home')->with('success','data has been deleted successfully');
    }

    public function index() {
        $store          = \Auth::user()->store_id;

        $orders = Orders::orderby('id','desc')->where('store_id',$store)->paginate(10);
        return view('admin.orders.index',compact('orders'));
    }

    public function change($id,$statue) {
        $content = Orders::find($id);
        $content->statue = $statue ;
        $content->save();
        return redirect()->route('admin.orders.edit',['id'=>$id])->with('success',trans('order.changed'));
    }

 
    public function edit($id) {
        $content = Orders::find($id);
        return view('admin.orders.edit',compact('content'));
    }



    public function delete($id){
        $order = Orders::find($id);
        if($order ){
            $order->delete();
        }
        return redirect()->route('admin.orders.home')->with('success','order deleted successfully');
    }


}
