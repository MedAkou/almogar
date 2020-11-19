  <style>
      aside.widget.widget_footer {
    width: 25%;
    float: left;
}

  </style>


  <footer class="ps-footer">
        <div class="ps-container">
            <div class="ps-footer__copyright">
                <div class="ps-container">
                    <div class="ps-block--site-features">
                        <div class="ps-block__item">
                            <div class="ps-block__left"><i class="icon-rocket"></i></div>
                            <div class="ps-block__right">
                                <h4>Schnell Lieferung</h4>
                                <p>Schnell Lieferung </p>
                            </div>
                        </div>
                      
                        <div class="ps-block__item">
                            <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                            <div class="ps-block__right">
                                <h4>Sichere Bezahlung</h4>
                                <p>100% sichere Zahlung</p>
                            </div>
                        </div>
                        <div class="ps-block__item">
                            <div class="ps-block__left"><i class="icon-bubbles"></i></div>
                            <div class="ps-block__right">
                                <h4>24/7 Hilfe</h4>
                                <p>o-bazaar 24/7 Hilfe</p>
                            </div>
                        </div>
                        <div class="ps-block__item">
                            <div class="ps-block__left"><i class="icon-gift"></i></div>
                            <div class="ps-block__right">
                                <h4>Geschenkservice</h4>
                                <p>Gutscheine und Rabatt</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-footer__copyright">
                <div class="container">
                <aside class="widget widget_footer widget_contact-us">
                    <h4 class="widget-title">{{ __('Address:') }}</h4>
                    <div class="widget_content">
                        <div style="display: none;">
                        <p>Rufen Sie uns</p>
                        <h3>017663686185 <br> 042116137026  </h3>
                        </div>
                        <p>{{ __('Address:') }} <br><a href="mailto:{{ baseSetting('email') }}">   Bremen - Deutschland  </a></p>
                        <ul class="ps-list--social">
                            @php
                                $facebook = baseSetting('facebook');
                                $twitter = baseSetting('twitter');
                                $instagram = baseSetting('instagram');
                                $youtube = baseSetting('youtube');
                                $linkedIn = baseSetting('linkedIn');
                            @endphp
                            @if(!empty($facebook))
                                <li><a href="{{ $facebook }}" class="facebook" target="_blank"><i class="fab fa-facebook"></i></a></li>
                            @endif
                            @if(!empty($twitter))
                               <li><a href="{{ $twitter }}" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if(!empty($instagram))
                               <li> <a href="{{ $instagram }}" class="instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            @endif
                            @if(!empty($youtube))
                               <li><a href="{{ $youtube }}" class="google-plus" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            @endif
                         
                        </ul>
                    </div>
                </aside>
                <aside class="widget widget_footer">
                    <ul class="ps-list--link">
                           <li><a href="/join">{{ __('Join us') }}</a></li>
                        <li><a href="/faq">{{ __('Faq') }}</a></li>
                        <li><a href="/payments-method">{{ __('Payment methods') }}</a></li>
                        <li><a href="/how-it-works">{{ __('How it works') }}</a></li>
       
                    </ul>
                </aside>

                


                <aside class="widget widget_footer">
                    <h4 class="widget-title">{{ __('Main Features') }}</h4>
                    <ul class="ps-list--link">
                        <li><a href="/">{{ __('Home') }}</a></li>
                        <li><a href="/about-us">{{ __('About Us') }}</a></li>
                        <li><a href="/contact-us">{{ __('Contact Us') }}</a></li>
                    </ul>
                </aside>
                    <aside class="widget widget_footer">
                    <h4 class="widget-title">{{ __('Main Features') }}</h4>
                    <ul class="ps-list--link">
                          <li><a href="/agb">{{ __('AGB ') }}</a></li>
                        <li><a href="/datenschutzerklarung">{{ __('Datenschutzerklärung') }}</a></li>
                    </ul>
                </aside>
                </div>
            </div>
            <div class="ps-footer__copyright">
                <p>
                    @php
                    $copyright = baseSetting('footer_copyright');
                    @endphp
                    @if(!empty($copyright))
                            {{ $copyright }}
                    @else
                    &copy; <script>   var CurrentYear = new Date().getFullYear(); document.write(CurrentYear); </script> All Rights Reserved
                    @endif
                </p>
                <p>
                    <span></span><a href="#"><img src="/assets/front/images/payments.png" ></a>
                </p>
            </div>
        </div>        
    </footer>