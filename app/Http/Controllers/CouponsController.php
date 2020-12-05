<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupons;

class CouponsController extends Controller {


    public function index() {
        $coupons = Coupons::orderby('id','desc')->paginate(10);
        return view('admin.coupons.index',compact('coupons'));     
    }

    public function bulkdelete() {
        Coupons::truncate();
        return Redirect()->back()->with('success','data has been deleted successfully');
    }

    public function edit($id){
        $content = Coupons::whereId($id)->first();
        return view('admin.coupons.edit',compact('content'));     
    }



    // Store coupon record
    public function store(Request $request){
        $this->validate($request, [
            'code' => 'required|unique:coupons',
            'discount' => 'required|max:3'
        ]);

        $input = $request->all();
        Coupons::create($input);
        $notification = array(
            'message' => 'Coupon successfully created.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.coupons.home')->with($notification);
    }

    /*/ Update coupon record
    public  function update(Request $request, $id){
        $this->validate($request, [
            'coupon' => 'required',
            'discount' => 'required|max:3'
        ]);
        $input = $request->all();
        $coupon = Coupon::whereId($id)->first();
        $coupon->update($input);
        $notification = array(
            'message' => 'Coupon successfully updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.coupons.index')->with($notification);
    }*/

    // Update coupon record
    public  function update(Request $request, $id){
        $this->validate($request, [
            'code' => 'required',
            'discount' => 'required|max:3'
        ]);
        //dd($request);


        $coupon = Coupons::whereId($id)->first();

        if( $request->has('statue') ){
            $request->request->add(['statue' => 'active']);
        }
        else{
            $request->request->add(['statue' => 'inactive']);
        }

        $input = $request->all();      

        $coupon->update($input);
        $notification = array(
            'message' => 'Coupon successfully updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.coupons.home')->with($notification);
    }

    public function delete($id){
        Coupons::find($id)->delete();

        $notification = array(
            'message' => 'Coupon successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.coupons.home')->with($notification);
    }

    // Apply Coupon
    public function applyCoupon(Request $request){
        $coupon = $request->coupon;
        $check = Coupon::where('coupon', $coupon)->first();
        if ($check){
            Session::put('coupon', [
                'name' => $check->coupon,
                'discount' => $check->discount,
            ]);
            $notification=array(
                'message'=>'Coupon applied!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            $notification=array(
                'message'=>'Invalid Coupon!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }


    // Remove Coupon
    public function removeCoupon(){
        Session::forget('coupon');
        $notification=array(
            'message'=>'Session Removed!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //duplicate coupon
    public function duplicate($id){
        $content = Coupons::find($id);
        $new = $content->replicate();
        $new->save();
        return Redirect()->back()->with('success',trans('Coupon successfully duplicated'));
    }




}
