<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;



class Orders extends Model
{
   
   use SoftDeletes;

   protected $table = 'orders';
    
   protected $guarded = ['id', 'created_at', 'updated_at'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];

   
    public function products()    {
        return $this->hasMany('App\Models\OrderDetails','order_id');
    }


    public function methodinvoice()    {

      if($this->payement->method == 'facture') {
        return 'Bargeld';
      }





      else{
          return 'online bezahlt';
      }



    }


    public function addresse()    {
        return $this->belongsTo('App\Models\Addresses','address_id');
    }


    public function user()    {
        return $this->belongsTo('App\Models\User')->withDefault([
          'name' => 'N-A',
        ]);
    }

    public function statue()    {
        if($this->statue == 'pending' ){
              return trans('order.pending');
          }

          if($this->statue == 'success' ){
              return trans('order.success');
          }

          if($this->statue == 'delivred' ){
              return trans('order.statue.delivred');
          }

          if($this->statue == 'canceled' ){
              return trans('order.statue.canceled');
          }
    }


    public function payement() {
        return $this->HasOne('App\Models\Payement','order_id')->withDefault([
          'name' => 'N-A',
        ]);
    }


    public function shipping() {
        return $this->belongsTo('App\Models\Shipping','shipping_id')->withDefault([
          'name' => trans('pickup'),
        ]);
    }

    
    public function store() {
        return $this->belongsTo('App\Models\Stores','store_id')->withDefault([
          'name' => 'N-A',
        ]);
    }

    public function getTotal(){
      $products = $this->products;
      $total=0;
      foreach ($products as $product) {
        $total += $product->price;
      }
      $shippingcost = 0;
      if($this->shipping->cost != null){
        $shippingcost = (float)str_replace('€', '', $this->shipping->cost);
      }
      return $total+$shippingcost;
    }

}
