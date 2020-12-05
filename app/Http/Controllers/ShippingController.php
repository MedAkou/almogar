<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use App;


class ShippingController extends Controller
{
 



    public function bulkdelete() {
         Shipping::truncate();
        return redirect()->route('admin.shipping.home')->with('success','data has been deleted successfully');
    }

 
    public function index() {
           $shipping = Shipping::Merchant()->Lang()->orderby('id','desc')->paginate(10);
        return view('admin.shipping.index',compact('shipping'));  
    }

    
    public function store( Request $request)
    {


        $rules = [
          'name'            => 'required', 
          'delivery_days'      => 'required',
          'cost'      => 'required',
        ];

        $messages = [
            'name.required'          => trans("name.required"),
            'delivery_days.required' => trans("delivery_days.required"),
            'cost.required'          => trans("slug.required"),
        ];

        $request->validate($rules,$messages);


        $content                = new Shipping ;
        $content->name          =  $request->name;
        $content->delivery_days =  $request->delivery_days   ;
        $content->statue        =  $request->statue;
        $content->cost          =  $request->cost;
        $content->store_id      =  $request->user()->store_id;
        $content->lang          =  App::getLocale();
        $content->save();

     return redirect()->route('admin.shipping.home')->with('success',trans('shipping.created'));

    }

    
    public function delete($id)
    {
         $content= Shipping::find($id);
         $content->delete();
        return redirect()->route('admin.shipping.home')->with('success',trans('shipping.deleted'));
    }


    public function edit($id)
    {
        $content= shipping::find($id);
        return view('admin.shipping.edit',compact('content'));
    }

    
    public function update(Request $request, $id)
    {
        $shipping                = shipping::find($id);
        $shipping->name          =  $request->name;
        $shipping->delivery_days =  $request->delivery_days   ;
        $shipping->statue        =  $request->statue;
        $shipping->cost          =  $request->cost;
        $shipping->save();
        return redirect()->route('admin.shipping.home')->with('success',trans('shipping.updated'));
    }

    public function duplicate($id)
    {
        $content = shipping::find($id);
        $new = $content->replicate();
        $new->save();
       return redirect()->route('admin.shipping.home')->with('success',trans('shipping.duplicated'));
    }

    
}
