<?php

namespace App\Helpers;
use App\Models\{User,Addresses};
use ShoppingCart;
use Auth;
use Hash;
use Mail;

class UsersHelper {



    public static function  store($request) {
        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->role     = $request->role;
        $user->statue   = 'active';
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
    }



    public function createOrder() {
            $content                 =  new  \App\Orders;
            $content->statue         =  'pending';
            $content->user_id        =  Auth::user()->id;
            $content->address_id     =  $this->adress();
            $content->total          =  ShoppingCart::totalPrice();
            $content->save();
            return $content->id;
    }


    public function adress() {
            $user_id = Auth::user()->id;
            $address = Addresses::where('user_id',$user_id)->where('is_shipping',true)->first();
            return $address->id;
    }


    public function saveOrderProduct($id) {

        $items = [];

        foreach (ShoppingCart::all() as $product) {
                $item = [
                    'order_id'   => $id ,
                    'product_id' => $product['id'] ,
                    'quantity'   => $product['qty'] ,
                    'price'      => $product['total'] ,
                ];
                $items[] = $item ;
        }

        return OrderDetails::insert($items);
    }


    public function notifyUser() {
        $user = Auth::user();
        $emailType = 'Comment';
        $emailView = 'Email.OrderCreated';
        $emailContent['Content'] = 'Place Email Body Here';
        $emailSubject = 'Place Subject Line Here ';
        $emailContent['Header'] = $emailSubject;
        $emailContent['buttonURL'] = '/';
        $emailContent['buttonTitle'] = 'Button Text';

        // Mail::send($emailView, ['user' => $user, 'emailContent' => $emailContent], function ($m) use ($user, $emailSubject) {
        //                 $m->from('support@email.com', 'emailName');
        //                 $m->to($user->email, $user->fname)->subject($emailSubject);
        });

    }



}