<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ baseSetting('sitename') }} | Datenschutzerklärung </title>
    <meta name="keywords" content="{{ option('metakeywords') }}" />
    <meta name="description" content="{{ __('tagline') }}">
    @php $favicon = option('favicon'); @endphp @if(!empty($favicon))
    <link rel="icon" type="image/x-icon" href="/uploads/{{ $favicon }}">
    @endif
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/css/all.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <style>
        .ps-block--site-features {
        border: none;
        }
        .ster {
        padding: 15px 0;
        }
    </style>
    <style>
      .header--standard.header--sticky .header__content {
    display: none;
}
    h3.stores-heading-h3 {
    text-align: center;
    margin-bottom: 55px;
    margin-top: -70px;
    font-size: 17px;
    line-height: 30px;
    color: #888;
    font-weight: 400;
    display: block;
    }
    h1.stores-heading-h1 {text-transform: capitalize;}
    .utf_star_rating_section {
    text-align: center;
    color: #dc3545;
    font-size: 19px;
    padding: 7px;
    }
    .store-listing-wrapper {
    margin-bottom: 75px;
    position: relative;
    }
    .utf_listing_item {
    background: #ccc;
    border-radius: 4px;
    height: 100%;
    display: block;
    position: relative;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50%;
    height: 300px;
    z-index: 100;
    cursor: pointer;
    }
    .utf_listing_item img {
    object-fit: cover;
    height: 100%;
    width: 100%;
    border-radius: 4px 4px 0 0;
    transition: transform 0.35s ease-out;
    transition: all 0.55s;
    }
    .utf_listing_item span.tag {
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.5px;
    font-weight: 600;
    background: #ff2222;
    border-radius: 4px;
    padding: 1px 6px;
    line-height: 20px;
    color: #fff;
    border: 2px solid #ff2222;
    margin-bottom: 9px;
    position: absolute;
    z-index: 9999;
    top: 20px;
    right: 20px;
    }
    .utf_listing_item span.featured_tag {
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.5px;
    font-weight: 500;
    background: #2cafe3;
    border-radius: 4px;
    padding: 1px 10px;
    line-height: 20px;
    color: #fff;
    border: 2px solid #2cafe3;
    margin-bottom: 9px;
    position: absolute;
    z-index: 9999;
    top: 58px;
    right: 20px;
    }
    .utf_listing_item_content {
    position: absolute;
    bottom: 45px;
    left: 0;
    padding: 0 20px;
    width: 100%;
    z-index: 50;
    box-sizing: border-box;
    }
    .utf_listing_item_content h3 {
    color: #fff;
    font-size: 20px;
    bottom: 2px;
    position: relative;
    font-weight: 400;
    margin: 0;
    line-height: 30px;
    }
    .utf_listing_item {
    position: relative;
    }
    .utf_listing_item_content span {
    display: block;
    }
    .utf_listing_item_content span i {
    color: red;
    margin-right: 10px;
    }
    .utf_listing_item_content {
    bottom: 33px;
    }
    .utf_listing_item {
    border-radius: 10px !important;
    overflow: hidden;
    }
    .utf_listing_item:before {
    content: "";
    top: 0;
    position: absolute;
    height: 100%;
    width: 100%;
    z-index: 9;
    background: linear-gradient(to top, rgba(0,0,0,0.9) 10%, rgba(0,0,0,0.60) 40%, rgba(22,22,23,0) 80%, rgba(0,0,0,0) 100%);
    background-color: rgba(0,0,0,0.2);
    border-radius: 4px 4px 0 0;
    opacity: 1
    }
    span.utf_meta_listing_price {
    color: white;
    }
    .utf_listing_prige_block span {
    color: white;
    }
    .utf_listing_item_content span {
    color: white;
    }
    .utf_listing_item_content span {
    display: block;
    }
    .utf_listing_item_content span i {
    color: red;
    margin-right: 10px;
    }
    .utf_listing_item_content {
    bottom: 33px;
    }
    .utf_listing_item {
    border-radius: 10px !important;
    overflow: hidden;
    }
    .utf_star_rating_section {
    padding: 15px;
    z-index: 99999;
    position: absolute;
    background: #fff;
    width: auto;
    bottom: -25px;
    left: 37px;
    right: 40px;
    border-radius: 4px;
    box-shadow: 0 1px 8px 0 rgba(0, 0, 0, 0.1);
    }
    .utf_listing_item_content {
    bottom: 51px;
    }
    .utf_star_rating_section {
    text-align: center;
    color: #dc3545;
    font-size: 19px;
    padding: 7px;
    }
    .restaurant {
    position: relative;
    display: flex;
    flex-direction: row;
    background-color: #fff;
    padding: 2px;
    border-radius: 2px;
    border: 1px solid #ebebeb;
    cursor: pointer;
    margin: 8px 0;
    min-height: 120px;
    overflow: hidden;
    }
    .restaurant .logowrapper {
    flex: 0 0 98px;
    text-align: center;
    border-right: 1px solid #ebebeb;
    min-height: 120px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    }
    .restaurant .logowrapper {
    flex: 0 0 138px;
    }
    .restaurant .restaurantname {
    font-family: Takeaway Sans,Avant Garde,Century Gothic,Helvetica,Arial,sans-serif;
    font-weight: 600;
    padding: 0;
    color: #0a3847;
    font-size: 18px;
    line-height: 22px;
    max-height: 66px;
    overflow: hidden;
    margin: 0 8px 0 0;
    }
    .restaurant .detailswrapper {
    flex: 1;
    min-height: 120px;
    line-height: 1.7;
    font-size: 15px;
    padding: 8px 0 0 8px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    }
    .restaurant .detailswrapper .kitchens {
    line-height: 22px;
    font-family: Roboto Slab,Arial,serif;
    font-size: 13px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0 8px 4px 0;
    color: #666;
    }
    .restaurant .detailswrapper .details .delivery div {
    margin-right: 16px;
    }
    .restaurant .detailswrapper .details .delivery div {
    margin-right: 16px;
    }
    .restaurant .detailswrapper .details .delivery {
    width: 100%;
    line-height: 18px;
    font-family: Roboto Slab,Arial,serif;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    }
    .delivery div {
    width: 100%;
    display: block;
    }
    .delivery span {
    display: block !important;
    width: 100%;
    margin-bottom: 10px;
    }
    .delivery.js-delivery-container {
    padding: 12px;
    }
    .delivery i {
    color: red;
    margin-right: 9px;
    }
    .restaurant {
    width: 96%;
    margin: 0 auto;
    margin-bottom: 19px;
    }
    @media only screen 
    and (min-device-width : 768px) 
    and (max-device-width : 1024px)  { 
    .d-sm-none.d-lg-none.d-md-none.js-restaurant.restaurant.restaurant__open {
    display: block !important;
    }
    .col-md-4.hidden-xs {
    display: none !important;
    }
    .restaurant .logowrapper {
    width: 30%;
    float: left;
    }
    .slide-bg {
    height: 180px;
    }
    .home-slider {
    height: 180px;
    }
    .home-slider-container, .home-slide {
    height: 180px;
    }
    .product-intro.divide-line.up-effect {
    margin-top: 43px;
    }
    }
    @media (max-width: 600px) and (min-width: 0px) {
    .slide-bg {
    height: 180px;
    }
    .home-slider {
    height: 180px;
    }
    .home-slider-container, .home-slide {
    height: 180px;
    }
    .product-intro.divide-line.up-effect {
    margin-top: 43px;
    }
    }





.ps-block--site-features .ps-block__item:first-child {
    padding-right: 0;
}


.ps-block--site-features .ps-block__item:nth-child(2) {
    padding: 0;
}

.ps-block--site-features .ps-block__item:nth-child(3) {
    padding-left: 0;
    padding-right: 0;
}

.ps-block--site-features .ps-block__item:last-child {
    padding-left: 0;
}

.ps-block__item {
    min-width: 280px;
    padding-left: 45px !important;
}



.home-pagination {
    text-align: center;
    margin-bottom: 45px;
}
@media all and (min-width:0px) and (max-width: 600px) {
.ps-block--site-features {
    padding: 0 !important;
}

.ps-block__item {
    padding-left: 10px !important;
}

aside.widget.widget_footer {
    width: 100% !important;
}
}

    </style>

   </head>
   <body>
      <header class="header header--standard header--market-place-1" data-sticky="true">
         <div class="header__top">
            <div class="container">
               <div class="header__left">
                  <p>{{ __('Welcome store') }}</p>
               </div>
               <div class="header__right">
                  <ul class="header__top-links">
                     <li>
                        <div class="ps-dropdown language">
                           <a href="javascript:;">{{  app('SiteSetting')->PresentLang() }}</a>
                           <ul class="ps-dropdown-menu">
                              <li><a href="?lang=ar"><img src="{{ asset('assets/website/img/flag/sa.png') }}" alt=""> العربية</a></li>
                              <li><a href="?lang=tr"><img src="{{ asset('assets/website/img/flag/tr.png') }}" alt=""> Turkish</a></li>
                              <li><a href="?lang=de"><img src="{{ asset('assets/website/img/flag/de.png') }}" alt=""> Deutsch</a></li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="header__content">
            <div class="container">
               <div class="header__content-left">
                  <div class="menu--product-categories">
                     <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                     <div class="menu__content">
                        <ul class="menu--dropdown">
                           <li><a href="#"><i class="icon-star"></i> Hot Promotions</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  @php
                  $logo = baseSetting('logo');
                  @endphp
                  @if(!empty($logo))
                  <a class="ps-logo" href="/">
                  <img src="/uploads/{{ $logo }}" alt="">
                  </a>
                  @endif
               </div>
               <div class="header__content-center">

               </div>
               <div class="header__content-right">

               </div>
            </div>
         </div>
         <nav class="navigation">
            <div class="container">
               <div class="navigation__left" style="display: none;">
                  <div class="menu--product-categories">
                     <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                     <div class="menu__content">
                        <ul class="menu--dropdown">
                           <li><a href="#"><i class="icon-star"></i> Hot Promotions</a>
                           </li>
                           <li class="menu-item-has-children has-mega-menu">
                              <a href="#"><i class="icon-laundry"></i> Consumer Electronic</a>
                              <div class="mega-menu">
                                 <div class="mega-menu__column">
                                    <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                       <li><a href="#">Digital Cables</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="navigation__right">
                  <ul class="menu">
                    {!!  app('SiteSetting')->WebsiteMenu('main') !!}
                  </ul>
                  <div class="ps-block--header-hotline inline">
                     <p><i class="icon-telephone"></i>Hotline:<strong> {{ baseSetting('phonenumber') }}</strong></p>
                  </div>
               </div>
            </div>
         </nav>

      </header>
      <header class="header header--mobile" data-sticky="true">
         <div class="navigation--mobile">
            <div class="navigation__left">
                @php
                    $logo = baseSetting('logo');
                @endphp
                @if(!empty($logo))
                <a class="ps-logo" href="/" class="logo">
                    <img src="/uploads/{{ $logo }}" >
                </a>
                @endif
            </div>
            <div class="navigation__right">
                <div class="header__actions">
                    <div class="ps-cart--mini">
                        <div class="ps-dropdown language">
                            <a href="javascript:;">{{  app('SiteSetting')->PresentLang() }}</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="?lang=ar"><img src="{{ asset('assets/website/img/flag/sa.png') }}" alt=""> العربية</a></li>
                                <li><a href="?lang=tr"><img src="{{ asset('assets/website/img/flag/tr.png') }}" alt=""> Turkish</a></li>
                                <li><a href="?lang=de"><img src="{{ asset('assets/website/img/flag/de.png') }}" alt=""> Deutsch</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
         </div>

      </header>

        <div class="container stores-wrapper" style="margin-top:50px;">
         <h1 class="stores-heading-h1 d-none">{{ __('home_latest') }}</h1>
         <h3 class="stores-heading-h3 d-none">{{ __('explore') }}</h3>
        

        <style> 
        pre.Datenschutzerklärung {
    white-space: pre-wrap;       /* css-3 */
    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    white-space: -pre-wrap;      /* Opera 4-6 */
    white-space: -o-pre-wrap;    /* Opera 7 */
    word-wrap: break-word;       /* Internet Explorer 5.5+ */
}</style>


            <h3>Allgemeine Geschäftsbedingungen (AGB) für Lieferanten/Drittanbieter</h3>


                <pre class="Datenschutzerklärung">   
                    
1.Begriffsbestimmungen  
AGB: Abkürzung für „Allgemeine Geschäftsbedingungen“
Kunden im Sinne dieser AGB sind alle Personen und Unternehmen, die unsere Website aufrufen, um sich über das hier bereitgestellte Angebot zu informieren und Bestellungen aufzugeben. 
„Wir“: Das ist das Unternehmen https://www.o-bazaar.com
 „Website“: Bedeutet diese von uns betriebene Angebotsseite (Internetauftritt). Wir benutzen den Begriff in der anglizierten Form. 
„Lieferant“/“Drittanbieter“: Unternehmen (Restaurant, Kiosk, Einzelhändler, Großhändler, Produzenten), welche ihre Produkte auf dieser Website anbieten.
„Vertrag“: Damit ist der zwischen dem Kunden und  dem Lieferanten geschlossene Liefervertrag, der durch uns vermittelt wird, gemeint. 
„Netzladen“: Unter diesem Begriff ist das gesamte auf unserer Website bereitgestellte Angebot verschiedener Lieferanten/Drittanbieter erfaßt. 

2.Information über die Betreiberin dieser Website
Betreiberin dieser Website ist die 
            https://www.o-bazaar.com
            Adresse : Amsterdamer Straße , Bremen , Deutschland
            Telefonnummer:     +4917663686184 / 042116137027
            E-Mail: obazaardeutschland2@gmail.com
Sie erreichen uns auch in den Sozialen Medien:
…………………………………………………………..
3.Allgemeines
Diese AGB sind in der Form einer Mitteilung an die Lieferanten/Drittanbieter abgefaßt. 
4.Anwendungsbereich dieser AGB
Diese Allgemeinen Geschäftsbedingungen gelten für die Bestellung und den Kauf von Produkten unserer Kunden über unsere Website (Netzladen) bei Lieferanten und Drittanbietern. Indem Sie eine Bestellung eines Kunden auf unserer Website bzw. in unserem Netzladen bestätigen, akzeptieren Sie diese AGB, ohne daß es einer besonderen Erklärung Ihrerseits dazu bedarf. 

Wir behalten uns vor, diese AGB zu ändern. Die geänderte Fassung der AGB ist wirksam und gilt für jede Bestellung, sobald sie auf unserer Website veröffentlicht worden ist. Es ist deshalb für Lieferanten und Drittanbieter ratsam und erforderlich, die jeweils geltenden AGB vor jeder Bestellung sorgfältig zu lesen.
5.Zustandekommen eines Liefervertrages mit Kunden
o.bazaar ist nicht Partner eines zwischen einem Kunden und dem Lieferanten/Drittanbieter geschlossenen Vertrages. Die Leistung von o.bazaar beschränkt sich auf das Betreiben und die Zurverfügungstellung dieser Website für Lieferanten/Drittanbieter und Kunden. Ein Vertrag zwischen Ihnen als Lieferanten/Drittanbieter kommt dadurch zustande, daß Sie die Ihnen von uns weitergeleitete Bestellung des jeweiligen Kunden per E-Mail bestätigen. Die Bestätigung ergeht direkt an den Kunden. 
Mit der Bestätigung der Bestellung eines Produktes willigen Sie zugleich darin ein, daß der Bestellung unsere „Allgemeinen Geschäftsbedingungen Kunden) zugrunde liegen. Diese AGB, die wir auf unserer Website veröffentlicht haben, sind also Bestandteil der Bestellung. Indem Sie die Bestellung eines Kunden annehmen, bestätigen Sie zugleich die Geltung unserer AGB Kunden. 
6.Abwicklung der Bestellung/Preise/Bezahlung
Alle Lieferanten und Drittanbieter sind vertraglich verpflichtet, die Endpreise für ihre Produkte in unserem Netzladen deutlich sichtbar bekanntzugeben. Die Preise beinhalten in der Regel die gesetzliche Mehrwertsteuer. Die gesonderte Geltendmachung der gesetzlichen Mehrwertsteuer zum Angebotspreis und über den Angebotspreis hinausgehende Liefer- und Bearbeitungskosten ist nur zulässig, wenn Sie dieses bereits bei ihrem Angebot deutlich sichtbar machen. 
Den Lieferanten und Drittanbietern ist nicht gestattet, unterschiedliche Preislisten zu führen. Die Preise der auf unserer Website angebotenen Produkte dürfen nicht von den üblichen Verkaufs- und Ladenpreisen abweichen. Sonderpreise und Rabattaktionen sind zeitgleich auf unserer Website anzubieten.
8.Risikoverteilung/Gewährleistungsausschluß
Wir schließen keinen Kaufvertrag über die von Lieferanten und Drittanbietern angebotenen Produkte ab und haften Ihnen gegenüber demgemäß auch nicht für Güte und Beschaffenheit der gelieferten Produkte.
Wir haften dem Kunden gegenüber auch nicht für die Lieferung des bestellten Produktes und für die Qualität der Auslieferung. Ihnen gegenüber machen wir nur eine ungefähre Angabe der vom Kunden gewünschten Lieferzeit. 
Das Risiko der Beschädigung und des Unterganges des an den Kunden zu liefernden Produktes tragen alleine Sie als  Lieferant/Drittanbieter.
9.Salvatorische Klausel
Sollten einzelne Bestimmungen dieser AGB unwirksam sein oder werden, so sollen die übrigen Bestimmungen weiterhin gültig sein. 
10.Anwendbares Recht
Für das Rechtsverhältnis zwischen dem Kunden und uns sowie dem Kunden  und Ihnen  als Lieferant/ Drittanbieter gilt ausschließlich das deutsche Recht. 


11.Einbeziehung der „Datenschutzerklärung für Lieferanten/Drittanbieter“
Die auf unserer Website veröffentlichen
a)  „Datenschutzerklärung für Lieferanten/Drittanbieter“ und
b)  „Allgemeine Geschäftsbedingungen (ABG) für Kunden“
sind Bestandteil dieser AGB. Mit der Bestätigung der Bestellung eines Kunden erklären Sie zuigleich, die „Datenschutzerklärung für Lieferanten/Drittanbieter“ und die „Allgemeine Geschäftsbedingungen (AGB) für Kunden“ gelesen und zur Kenntnis genommen zu haben. 

ENDE


                </pre>












         </div>


      </div>




     </div>
<div class="ps-download-app">
            <div class="ps-container">
                <div class="ps-block--download-app">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <div class="ps-block__thumbnail"><img src="/assets/website/img/app1.png" alt=""></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <div class="ps-block__content">
                                    <h3>Download o-bazaar App Now!</h3>
                                    <p>Shopping fastly and easily more with our app. Get a link to download the app on your phone</p>                                    

                                    <p>Shopping fastly and easily more with our app. Get a link to download the app on your phone</p>                                    <p>Shopping fastly and easily more with our app. Get a link to download the app on your phone</p>


                                   
                                    <p class="download-link"><a href="#"><img src="/assets/website/img/google-play.png" alt=""></a><a href="#"><img src="/assets/website/img/app-store.png" alt=""></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include(\System::$ACTIVE_THEME_PATH.'//elements/footer')


     
      <div id="back2top"><i class="pe-7s-angle-up"></i></div>
      <div class="ps-site-overlay"></div>
      <div id="loader-wrapper">
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <script src="{{ asset('assets/website/js/all.js') }}"></script>
   </body>
   {{ option('thebottomofthesite') }}
   </body>
</html>