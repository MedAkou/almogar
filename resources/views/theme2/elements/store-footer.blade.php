<div class="mobile-menu-overlay"></div>

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                {!!  app('SiteSetting')->MerchantMenu('phone') !!}
            </ul>
        </nav>
        <div class="social-icons">
            @if(!empty($facebook))
            <a href="{{ $facebook }}" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
            @endif

            @if(!empty($twitter))
            <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
            @endif

            @if(!empty($instagram))
            <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body add-cart-box text-center">
        <p>You've just added this product to the<br>cart:</p>
        <h4 id="productTitle"></h4>
        <img src="#" id="productImage" width="100" height="100" alt="adding cart image">
        <div class="btn-actions">
            <a href="cart.html"><button class="btn-primary">Go to cart page</button></a>
            <a href="#"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
