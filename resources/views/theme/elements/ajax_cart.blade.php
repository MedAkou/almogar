<div class="ps-cart__items">
   <input type="hidden" id="cartcount" value="<?php  echo  ShoppingCart::count(false);?>">
   <?php  if(!empty(ShoppingCart::all())): foreach(ShoppingCart::all() as $product):  ?>
   <div class="ps-product--cart-mobile">
      <div class="ps-product__thumbnail">
         <a href="<?php  route('shop.product',['id' => $product['id'] , 'store' => $store ])  ?>">
         <img src="<?php  echo $product['thumbnail']  ?>" alt="product" />
         </a>
      </div>
      <div class="ps-product__content lhsabbdyaltele">
         <a class="ps-product__remove"
            href="<?php echo route('cart.remove', ['id' => $product->rawId() , 'store' => $store ])   ?>">
         <i class="icon-cross"></i>
         </a>
         <a href="<?php echo route('shop.product',['id' => $product['id'] , 'store' => $store ])  ?>">
         <?php echo $product['name'];  ?>
         </a>
         <p><strong> {{ __('Sold by') }} </strong> {{ $store }}</p>
         <small class="product-col-tele-<?php echo $product['id']  ?>"> <span
            class="prdqty"><?php echo $product['qty']  ?></span> x €<?php echo  $product['price']  ?> <input
            type="hidden" class="preis" value="<?php  echo  $product['total']  ?>"> </small>
      </div>
      <div class="form-group--number zaydnaks updowntintele">
         <button class="up">+</button>
         <button class="down">-</button>
         <input class="quantity-ajax form-control instantQuantity" data-product-id='<?php echo $product['id'];?>'
            data-price='<?php echo $product['price'];  ?>' data-product="<?php echo $product->rawId();  ?>"
            type="text" value="<?php echo $product['qty']  ?>">
      </div>
   </div>
   <?php  endforeach;  ?>
   <?php  endif;  ?>
</div>
<div class="ps-cart__footer ps-cart__footer2 ">
   <h3 class="jahnama">
      {{ __('Total') }}<strong><?php echo $symbol  ?><?php  echo  ShoppingCart::total()  ?></strong>
   </h3>
   <figure>
      <a class="ps-btn" href="<?php echo route('cart', ['store' => $store ])  ?>"
         style="background-color: rgb(195, 20, 50);"> <?php echo trans('View Cart')  ?></a>
      <a class="ps-btn" href="<?php echo route('checkout', ['store' => $store ])  ?>"
         style="background-color: rgb(195, 20, 50);"><?php echo trans('Checkout')  ?></a>
   </figure>
</div>