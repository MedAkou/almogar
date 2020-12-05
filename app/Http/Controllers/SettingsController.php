<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Option;

class SettingsController extends Controller
{



    public function home() {
        $time_zone_list = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
        return view('admin/settings/home',compact('time_zone_list'));
    }

   public function save(Request $request) {

        if($request->has('topsite')){
                option(['thetopofsite' => $request->topsite]);
        }
        if($request->has('bottomsite')){
                option(['thebottomofthesite' => $request->bottomsite]);
        }
     return redirect()->route('admin.settings.others')->with('success',trans('settings.updated'));
    }

   
    public function store(Request $request) {

             return redirect()->route('admin.settings.home');
    }

    public function general(Request $request) {

       if($request->hasFile('logo')){
            $logo = $request->logo->store('media',['disk' => 'public']);   
            option(compact('logo'));  
        }

        if($request->hasFile('favicon')){
            $favicon = $request->favicon->store('media',['disk' => 'public']);   
            option(compact('favicon'));  
        }

        option(['sitename'             => $request->name]);
        option(['tagline'              => $request->tagline]);
        option(['metakeywords'         => $request->keywords]);
        option(['websitestatue'        => $request->statue]);
        option(['allowcomments'        => $request->comments]);
        option(['controlpanellanguage' => $request->language]);
        option(['phonenumber'          => $request->phone]);
        option(['email'                => $request->email]);
        option(['adresse'              => $request->adress]);
        option(['GoogleAnalitycscode'  => $request->code]);
        option(['applinkingooglestore' => $request->googleStore]);
        option(['applinkinapplestore'  => $request->appleStore]);
        option(['cookiestext'          => $request->cookiestext]);
        option(['Timezone'             => $request->time_zone]);
        option(['reCAPTCHApublickey'   => $request->recaptchaPublic]);
        option(['reCAPTCHAprivatekey'  => $request->recaptchaPrivate]);
        option(['googlemapsapi'        => $request->maps]);
        option(['DateFormat'           => $request->DateFormat]);
        option(['footer_copyright'     => $request->footer_copyright]);
        option(['currency'             => $request->currency]);
        
        return redirect()->route('admin.settings.home')->with('success',trans('settings.updated'));
    }


    public function social (Request $request) {
        option(['facebook'    => $request->facebook]);
        option(['twitter'     => $request->twitter]);
        option(['instagram'   => $request->instagram]);
        option(['youtube'     => $request->youtube]);
        option(['linkedIn'    => $request->linkedIn]);
        return redirect()->route('admin.settings.home')->with('success',trans('settings.updated'));
    }



    public function stripe (Request $request) {
        option(['stripe_skey'    => $request->stripe_skey]);
        option(['stripe_pkey'    => $request->stripe_pkey]);
        return redirect()->route('admin.settings.home')->with('success',trans('settings.updated'));
    }



    public function paypal (Request $request) {
        option(['paypal_username'    => $request->paypal_username]);
        option(['paypal_password'    => $request->paypal_password]);
        option(['paypal_secret'    => $request->paypal_secret]);
        return redirect()->route('admin.settings.home')->with('success',trans('settings.updated'));
    }


    public function newsletter (Request $request) {
        option(['ApiKey'    => $request->ApiKey]);
        option(['listId'     => $request->listId]);
        return redirect()->route('admin.settings.home')->with('success',trans('settings.updated'));
    }





}
