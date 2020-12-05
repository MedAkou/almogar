<!DOCTYPE html>
<html lang="{{ App::getLocale() }}"  dir="{{ System::isRtl()?'rtl':'ltr' }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>{{ baseSetting('sitename') }} | {{ __('Data protection') }} </title>
      <meta name="keywords" content="{{ option('metakeywords') }}" />
      <meta name="description" content="{{ __('tagline') }}">
      @php $favicon = option('favicon'); @endphp @if(!empty($favicon))
         <link rel="icon" type="image/x-icon" href="/uploads/{{ $favicon }}">
      @endif
      <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
      @if(System::isRtl())
         <link rel="stylesheet" href="{{ asset('assets/website/css/all_rtl.css') }}?v={{ env('ASSETS_VERSION') }}">
         <link rel="stylesheet" href="{{ asset('assets/website/css/stylehome_rtl.css') }}?v={{ env('ASSETS_VERSION') }}">
      @else
         <link rel="stylesheet" href="{{ asset('assets/website/css/all.css') }}?v={{ env('ASSETS_VERSION') }}">
         <link rel="stylesheet" href="{{ asset('assets/website/css/stylehome.css') }}?v={{ env('ASSETS_VERSION') }}">
      @endif
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
                           @include(\System::$ACTIVE_THEME_PATH.'/elements/lang_list')
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


            <h3>     Datenschutzerklärung für Lieferanten/Drittanbieter </h3>


                <pre class="Datenschutzerklärung">   
<h3> 1.Begriffsbestimmungen  </h3>
 
„Lieferanten“ und „Drittanbieter“  im Sinne dieser Datenschutzerklärung sind alle Unternehmen (Restaurant, Kiosk, Einzelhändler, Großhändler), die unsere Website nutzen, um ihre Produkte zur Vermittlung und zum Verkauf an  Verbraucher und andere Unternehmen anzubieten.
„Wir“: Das ist das Unternehmen https://o-bazaar.com
„Website“: Bedeutet diese von uns betriebene Angebotsseite (Internetauftritt). Wir benutzen den Begriff in der anglizierten Form. 
 „Vertrag“: Damit ist der zwischen dem Kunden und  dem Lieferanten geschlossene Liefervertrag, der durch uns vermittelt wird, gemeint. 
„Kunden“ sind aller Personen und Unternehmen, die unsere Website aufrufen, um sich über das durch die Lieferanten bereitsgestellte Angebot zu informieren und Bestellungen aufzugeben. 

<h3> 2.Information über die Erhebung personenbezogener Daten</h3>
 
<b>(1)</b> Im Folgenden informieren wir über die Erhebung personenbezogener Daten bei Nutzung unserer Website. Die Erklärung ist aufgrund der gesetzlichen Vorgaben umfangreich, obgleich wir hoffen, dass Sie diese bzw. die für Sie relevanten Passagen sorgfältig lesen und zur Kenntnis nehmen. Sie ist in Ihrem Interesse konzipiert, um Ihnen die Möglichkeit zu geben zu überprüfen, welche Daten von Ihnen gespeichert werden. Sie dient auch unserem Interesse daran, die gesetzlichen Vorgaben einzuhalten. Viele Definitionen, wie die der „Personenbezogene Daten“ sind im Gesetz (Art. 4 Nr. 1 DS-GVO) enthalten und werden daher im Wortlaut nicht wiederholt, damit die Übersichtlichkeit nicht allzu sehr darunter leidet. Personenbezogene Daten sind beispielhaft alle Daten, die auf Sie persönlich beziehbar sind, z. B. Name, Adresse, E-Mail-Adressen, Nutzerverhalten. Die Kategorien der betroffenen Personen sind unter anderem Besucher, Kunden oder Lieferanten. 
<b>(2)</b>  Verantwortlicher gem. Art 4 Abs. 7 EU-Datenschutz-Grundverordnung (DS-GVO) ist ?????

<h3> 3.Ihre Rechte</h3>
 
Sie haben das Recht:
<b>(1)</b> gemäß Art. 15 DSGVO Auskunft über Ihre von uns verarbeiteten personenbezogenen Daten zu verlangen. Insbesondere können Sie Auskunft über die Verarbeitungszwecke, die Kategorie der personenbezogenen Daten, die Kategorien von Empfängern, gegenüber denen Ihre Daten offengelegt wurden oder werden, die geplante Speicherdauer, das Bestehen eines Rechts auf Berichtigung, Löschung, Einschränkung der Verarbeitung oder Widerspruch, das Bestehen eines Beschwerderechts, die Herkunft ihrer Daten, sofern diese nicht bei uns erhoben wurden, sowie über das Bestehen einer automatisierten Entscheidungsfindung einschließlich Profiling und ggf. aussagekräftigen Informationen zu deren Einzelheiten verlangen;
<b>(2)</b> gemäß Art. 16 DSGVO unverzüglich die Berichtigung unrichtiger oder Vervollständigung Ihrer bei uns gespeicherten personenbezogenen Daten zu verlangen;
<b>(3) </b>gemäß Art. 17 DSGVO die Löschung Ihrer bei uns gespeicherten personenbezogenen Daten zu verlangen, soweit nicht die Verarbeitung zur Ausübung des Rechts auf freie Meinungsäußerung und Information, zur Erfüllung einer rechtlichen Verpflichtung, aus Gründen des öffentlichen Interesses oder zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen erforderlich ist;
<b>(4)</b> gemäß Art. 18 DSGVO die Einschränkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen, soweit die Richtigkeit der Daten von Ihnen bestritten wird, die Verarbeitung unrechtmäßig ist, Sie aber deren Löschung ablehnen und wir die Daten nicht mehr benötigen, Sie jedoch diese zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen benötigen oder Sie gemäß Art. 21 DSGVO Widerspruch gegen die Verarbeitung eingelegt haben;
<b>(5)</b> gemäß Art. 20 DSGVO Ihre personenbezogenen Daten, die Sie uns bereitgestellt haben, in einem strukturierten, gängigen und maschinenlesebaren Format zu erhalten oder die Übermittlung an einen anderen Verantwortlichen zu verlangen;
<b>(6)</b> gemäß Art. 7 Abs. 3 DSGVO Ihre einmal erteilte Einwilligung jederzeit gegenüber uns zu widerrufen. Dies hat zur Folge, dass wir die Datenverarbeitung, die auf dieser Einwilligung beruhte, für die Zukunft nicht mehr fortführen dürfen und
<b>(7)</b> gemäß Art. 77 DSGVO sich bei einer bzw. jeder Aufsichtsbehörde zu beschweren. 
<h3>
4.Erhebung personenbezogener Daten bei Besuch unserer Website.</h3>
<b>(1)</b> Bei der bloß informatorischen Nutzung der Website, also wenn Sie nur auf der Webseite surfen, erheben wir nur die personenbezogenen Daten, die Ihr Browser an unseren Server übermittelt. Wenn Sie unsere Website betrachten möchten, erheben wir die folgenden Daten, die für uns technisch erforderlich sind, um Ihnen unsere Website anzuzeigen und die Stabilität und Sicherheit zu gewährleisten (Rechtsgrundlage ist Art. 6 Abs. 1 S. 1 lit. f DS-GVO):
IP-Adresse
Datum und Uhrzeit der Anfrage
Zeitzonendifferenz zur Greenwich Mean Time (GMT)
Inhalt der Anforderung (konkrete Seite)
Zugriffsstatus/HTTP-Statuscode
jeweils übertragene Datenmenge
Website, von der die Anforderung kommt
Browser
Betriebssystem und dessen Oberfläche
Sprache und Version der Browsersoftware.
<b>(2)</b> Unser berechtigtes Interesse an einer technisch funktionierenden Website überwiegt Ihr Interesse. Diese Abwägung wurde bei Erstellung der Website vorgenommen. Es steht jedem Besucher frei, diese Seite zu verlassen. Außerdem haben wir ein Interesse daran, dass unsere Dienstleistung Ihnen in ansprechender und informativer Form nähergebracht wird. Hierzu nutzen wir die Möglichkeiten im Rahmen der Gestaltung eines Internettauftritts. Dafür benötigen wir die oben erwähnten Daten. Da Sie sich entschlossen haben, unsere Website zu besuchen, tritt Ihr Interesse an der Nichterfassung gesetzliche Aufbewahrungspflichten dagegensprechen. Im Falle des reinen informativen Besuches werden die Daten umgehend gelöscht. 

<b>(3)</b> Sie haben ein Widerspruchsrecht nach Art. 21 DS-GVO. Dieses greift im Falle einer besonderen Situation. Sie können den Widerspruch an ??????????????richten.

<h3> 5.Löschung von Daten</h3>
Die von uns verarbeiteten Daten werden nach Maßgabe der Art. 17 und 18 DSGVO gelöscht oder in ihrer Verarbeitung eingeschränkt. Sofern nicht im Rahmen dieser Datenschutzerklärung ausdrücklich angegeben, werden die bei uns gespeicherten Daten gelöscht, sobald sie für ihre Zweckbestimmung nicht mehr erforderlich sind und der Löschung keine gesetzlichen Aufbewahrungspflichten entgegenstehen. Sofern die Daten nicht gelöscht werden, weil sie für andere und gesetzlich zulässige Zwecke erforderlich sind, wird deren Verarbeitung eingeschränkt. D.h. die Daten werden gesperrt und nicht für andere Zwecke verarbeitet. Das gilt z.B. für Daten, die aus handels- oder steuerrechtlichen Gründen aufbewahrt werden müssen. Nach gesetzlichen Vorgaben in Deutschland erfolgt die Aufbewahrung insbesondere für 10 Jahre gemäß §§ 147 Abs. 1 AO, 257 Abs. 1 Nr. 1 und 4, Abs. 4 HGB (Bücher, Aufzeichnungen, Lageberichte, Buchungsbelege, Handelsbücher, für Besteuerung relevanter Unterlagen, etc.) und 6 Jahre gemäß § 257 Abs. 1 Nr. 2 und 3, Abs. 4 HGB (Handelsbriefe).

<h3> 6.Einsatz von Cookies</h3>
<b>(1)</b> Diese Website nutzt folgende Arten von Cookies, deren Umfang und Funktionsweise im Folgenden erläutert werden:
Transiente Cookies (dazu (2)
Persistente Cookies (dazu (3).
<b>(2) </b>Transiente Cookies werden automatisiert gelöscht, wenn Sie den Browser schließen. Dazu zählen insbesondere die Session-Cookies. Diese speichern eine sogenannte Session-ID, mit welcher sich verschiedene Anfragen Ihres Browsers der gemeinsamen Sitzung zuordnen lassen. Dadurch kann Ihr Rechner wiedererkannt werden, wenn Sie auf unsere Website zurückkehren. Die Session-Cookies werden gelöscht, wenn Sie sich ausloggen oder den Browser schließen.
<b>(3)</b> Persistente Cookies werden automatisiert nach einer vorgegebenen Dauer gelöscht, die sich je nach Cookie unterscheiden kann. Sie können die Cookies in den Sicherheitseinstellungen Ihres Browsers jederzeit löschen.
<b>(3)</b> Sie können Ihre Browser-Einstellung entsprechend Ihren Wünschen konfigurieren und z. B. die Annahme von Third-Party-Cookies oder allen Cookies ablehnen. Wir weisen Sie darauf hin, dass Sie eventuell nicht alle Funktionen dieser Website nutzen können.
<b>(4)</b> Die genutzten Flash-Cookies werden nicht durch Ihren Browser erfasst, sondern durch Ihr Flash-Plug-in. Weiterhin nutzen wir HTML5 storage objects, die auf Ihrem Endgerät abgelegt werden. Diese Objekte speichern die erforderlichen Daten unabhängig von Ihrem verwendeten Browser und haben kein automatisches Ablaufdatum. Wenn Sie keine Verarbeitung der Flash-Cookies wünschen, müssen Sie ein entsprechendes Add-On installieren, z. B. „Better Privacy“ für Mozilla Firefox (https://addons.mozilla.org/de/firefox/addon/betterprivacy/) oder das Adobe-Flash-Killer-Cookie für Google Chrome. Die Nutzung von HTML5 storage objects können Sie verhindern, indem Sie in Ihrem Browser den privaten Modus einsetzen. Zudem empfehlen wir, regelmäßig Ihre Cookies und den Browser-Verlauf manuell zu löschen.

<h3> 7. Einsatz von Google Diensten</h3>
<b>(1)</b> Wir nutzen auf unserer Website verschiedene Dienste der Google Inc. („Google“), 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA. Nähere Informationen zu den einzelnen konkreten Diensten von Google, die wir auf dieser Webseite nutzen, finden Sie in der weiteren Datenschutzerklärung. Durch die Einbindung der Google Dienste erhebt Google unter Umständen Informationen (auch personenbezogene Daten) und verarbeitet diese. Dabei kann nicht ausgeschlossen werden, dass Google die Informationen auch an einen Server in einem Drittland übermittelt. Wie aus der Privacy-Shield-Zertifizierung von Google hervorgeht (unter https://www.privacyshield.gov/list  unter dem Suchbegriff „Google“ zu finden), hat Google sich zur Einhaltung des EU-US Privacy Shield Framework und des Swiss-US Privacy Shield Framework über die Erhebung, Nutzung und Speicherung von personenbezogenen Daten aus den Mitgliedsstaaten der EU bzw. der Schweiz verpflichtet. Google, einschließlich Google LLC und seiner hundertprozentigen Tochtergesellschaften in den USA, hat durch Zertifizierung erklärt, dass es die Privacy-Shield-Prinzipien einhält. Weitere Informationen dazu finden Sie unter https://www.google.de/policies/privacy/frameworks/ . Wir selbst können nicht beeinflussen, welche Daten Google tatsächlich erhebt und verarbeitet. Google gibt jedoch an, dass grundsätzlich unter anderem folgende Informationen (auch personenbezogene Daten) verarbeitet werden können:

Protokolldaten (insbesondere die IP-Adresse)
Standortbezogene Informationen
Eindeutige Applikationsnummern
Cookies und ähnliche Technologien
<b>(2)</b> Wenn Sie in Ihrem Google-Konto angemeldet sind, kann Google die verarbeiteten Informationen abhängig von Ihren Kontoeinstellungen Ihrem Konto hinzufügen und als personenbezogene Daten behandeln, vgl. hierzu insbesondere https://www.google.de/policies/privacy/partners . Google führt hierzu u.a. Folgendes aus:

„Unter Umständen verknüpfen wir personenbezogene Daten aus einem Dienst mit Informationen und personenbezogenen Daten aus anderen Google-Diensten. Dadurch vereinfachen wir             Ihnen beispielsweise das Teilen von Inhalten mit Freunden und Bekannten. Je nach Ihren Kontoeinstellungen werden Ihre Aktivitäten auf anderen Websites und in Apps gegebenenfalls                 mit Ihren personenbezogenen Daten verknüpft, um die Dienste von Google und von Google eingeblendete Werbung  zu verbessern.“ (https://www.google.com/intl/de/policies/privacy/index.html )

Ein direktes Hinzufügen dieser Daten können Sie verhindern, indem Sie sich aus Ihrem Google-Konto ausloggen oder auch die entsprechenden Kontoeinstellungen in Ihrem Google-Konto vornehmen. Weiterhin können Sie Ihre Cookie-Einstellungen ändern (z.B. Cookies löschen, blockieren u.a.). Weitere Informationen hierzu finden Sie unter „§ 4 Cookies“. Nähere Informationen finden Sie in den Datenschutzhinweisen von Google, die Sie hier abrufen können:

https://www.google.com/policies/privacy/
Hinweise zu den Privatsphäreeinstellungen von Google finden Sie unter 
https://privacy.google.com/take-control.html

<b>(3)</b> Einsatz von Google Maps
a) Auf dieser Website nutzen wir das Angebot von Google Maps. Dadurch können wir Ihnen interaktive Karten direkt in der Website anzeigen und ermöglichen Ihnen die komfortable Nutzung der Karten-funktion.
b) Durch den Besuch auf der Website erhält Google die Information, dass Sie die entsprechende Unterseite unserer Website aufgerufen haben. Zudem werden die unter § 3 dieser Erklärung genannten Daten übermittelt. Dies erfolgt unabhängig davon, ob Google ein Nutzerkonto bereitstellt, über das Sie eingeloggt sind, oder ob kein Nutzerkonto besteht. Wenn Sie bei Google eingeloggt sind, werden Ihre Daten direkt Ihrem Konto zugeordnet. Wenn Sie die Zuordnung mit Ihrem Profil bei Google nicht wünschen, müssen Sie sich vor Aktivierung des Buttons ausloggen. Google speichert Ihre Daten als Nutzungsprofile und nutzt sie für Zwecke der Werbung, Marktforschung und/oder bedarfsgerechten Gestaltung seiner Website. Eine solche Auswertung erfolgt insbesondere (selbst für nicht eingeloggte Nutzer) zur Erbringung von bedarfsgerechter Werbung und um andere Nutzer des sozialen Netzwerks über Ihre Aktivitäten auf unserer Website zu informieren. Ihnen steht ein Widerspruchsrecht zu gegen die Bildung dieser Nutzerprofile, wobei Sie sich zur Ausübung dessen an Google richten müssen.

c) Weitere Informationen zu Zweck und Umfang der Datenerhebung und ihrer Verarbeitung durch den Plug-in-Anbieter erhalten Sie in den Datenschutzerklärungen des Anbieters. Dort erhalten Sie auch weitere Informationen zu Ihren diesbezüglichen Rechten und Einstellungsmöglichkeiten zum Schutze Ihrer Privatsphäre: http://www.google.de/intl/de/policies/privacy . Google verarbeitet Ihre personenbezogenen Daten auch in den USA und hat sich dem EU-US Privacy Shield unterworfen, https://www.privacyshield.gov/EU-US-Framework .

<b>(4)</b> Einsatz von YOUTUBE
Wir setzen innerhalb unseres Onlineangebotes auf Grundlage unserer berechtigten Interessen (d.h. Interesse an der Analyse, Optimierung und wirtschaftlichem Betrieb unseres Onlineangebotes im Sinne des Art. 6 Abs. 1 lit. f. DSGVO) Inhalts- oder Serviceangebote von Drittanbietern ein, um deren Inhalte und Services, wie z.B. Videos oder Schriftarten einzubinden (nachfolgend einheitlich bezeichnet als “Inhalte”). Wir binden in diesem Zusammenhang die Videos der Plattform “YouTube” des Anbieters Google LLC, 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA, ein. Datenschutzerklärung: https://www.google.com/policies/privacy/, Opt-Out: https://adssettings.google.com/authenticated .


<h3> 8. Bewertungsplattform ProvenExpert.com</h3>
<b>(1) </b>Wir haben die Bewertungsplattform ProvenExpert.com betrieben durch Expert Systems AG Quedlinburger Strasse 1, 10589 Berlin, (im Folgenden ProvenExpert) bei dieser Website als Widget eingebunden, um Ihnen eine Bewertunsgmöglichkeit zu geben. Die Datenschutzerklärung dieses Dienstleisters finden Sie derzeit unter https://www.provenexpert.com/de-de/datenschutzbestimmungen/ . Dort finden Sie alle näheren Informationen zur Verarbeitung Ihrer Daten bei der Abgabe einer Bewertung.
<b>(2)</b> Im Rahmen der Erstellung von Bewertungen speichert der Anbieter von Proven Expert Ihre Emailadresse sowie das dazugehörige Logfile als Bestandsdaten. Nach Angaben von Proven Expert besteht die Logfile aus der IP-Adresse, die dem anfragenden Rechner vom Internetzugangsprovider für die Session zugewiesen ist, sowie Name und Version des Internetbrowsers, mit welchem Sie unsere Website aufgerufen haben. Die Speicherung der Bestandsdaten ist für den Anbieter von Proven Expert erforderlich, um Missbrauch (z.B. durch Mehrfachbewertungen durch Nutzer) zu verhindern. Sie können hier auch freiwillig weitere Angaben (z.B. Name und Firma) machen, die dann ebenfalls von dem Anbieter gespeichert werden.
<b>(3)</b> Rechtsgrundlage für die Datenverarbeitung ist Artikel 6 Absatz 1 Satz 1 lit. f DSGVO. Die Verarbeitung ist zur Wahrung der berechtigten Interessen des Verantwortlichen oder eines Dritten erforderlich, da Sie selbst entschieden haben, uns zu bewerten. Mit entsprechenden Bewertungen können wir feststellen, ob Sie mit unserer Dienstleistung zufrieden sind. 
<b>(4)</b> Es besteht ferner ein Widerspruchsrecht nach Art. 21 DS-GVO. Dieses greift im Falle einer besonderen Situation.

<h3> 9. Widerspruchsrecht</h3>
<b>(1) </b>Sofern Ihre personenbezogenen Daten auf Grundlage von berechtigten Interessen gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO verarbeitet werden, haben Sie das Recht, gemäß Art. 21 DSGVO Widerspruch gegen die Verarbeitung Ihrer personenbezogenen Daten einzulegen, soweit dafür Gründe vorliegen, die sich aus Ihrer besonderen Situation ergeben oder sich der Widerspruch gegen Direktwerbung richtet. Im letzteren Fall haben Sie ein generelles Widerspruchsrecht, das ohne Angabe einer besonderen Situation von uns umgesetzt wird.

<b>(2)</b> Möchten Sie von Ihrem Widerrufs- oder Widerspruchsrecht Gebrauch machen, genügt eine E-Mail an  ??????? mit dem beispielhaften Betreff Widerspruch oder Widerruf oder einen Betreff Ihrer Wahl.

ENDE

                </pre>












         </div>


      </div>




     </div>
         @include(\System::$ACTIVE_THEME_PATH.'//elements/download-app')
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