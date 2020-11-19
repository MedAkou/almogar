<?php

namespace App\Http\Controllers\Manager;
use \App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Setting;
use Option;

class ManagerSettingsController extends Controller
{


    public function show()  {
        $time_zone_list = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
        return view('manager/statique/settings',compact('time_zone_list'));
    }


        public function update(Request $request) {

               if($request->hasFile('logo')){
                    $logo = $request->logo->store('media',['disk' => 'public']);   
                   baseSetting(compact('logo'));  
                }

                if($request->hasFile('favicon')){
                    $favicon = $request->favicon->store('media',['disk' => 'public']);   
                   baseSetting(compact('favicon'));  
                }

               baseSetting(['sitename'             => $request->name]);
               baseSetting(['tagline'              => $request->tagline]);
               baseSetting(['metakeywords'         => $request->keywords]);
               baseSetting(['websitestatue'        => $request->statue]);
               baseSetting(['allowcomments'        => $request->comments]);
               baseSetting(['controlpanellanguage' => $request->language]);
               baseSetting(['phonenumber'          => $request->phone]);
               baseSetting(['email'                => $request->email]);
               baseSetting(['adresse'              => $request->adress]);
               baseSetting(['GoogleAnalitycscode'  => $request->code]);
               baseSetting(['applinkingooglestore' => $request->googleStore]);
               baseSetting(['applinkinapplestore'  => $request->appleStore]);
               baseSetting(['cookiestext'          => $request->cookiestext]);
               baseSetting(['Timezone'             => $request->time_zone]);
               baseSetting(['reCAPTCHApublickey'   => $request->recaptchaPublic]);
               baseSetting(['reCAPTCHAprivatekey'  => $request->recaptchaPrivate]);
               baseSetting(['googlemapsapi'        => $request->maps]);
               baseSetting(['DateFormat'           => $request->DateFormat]);
               baseSetting(['footer_copyright'     => $request->footer_copyright]);
               baseSetting(['currency'             => $request->currency]);

               return redirect()->route('manager.settings')->with('success',trans('settings.updated'));

        }


        public function social (Request $request) {
               baseSetting(['facebook'             => $request->facebook]);
               baseSetting(['twitter'              => $request->twitter]);
               baseSetting(['instagram'            => $request->instagram]);
               baseSetting(['youtube'              => $request->youtube]);
               baseSetting(['linkedIn'             => $request->linkedIn]);
               return redirect()->route('manager.settings')->with('success',trans('settings.updated'));

        }


}
