<?php

namespace App\Http\Middleware;

use Closure;

class Localization
{
   

    const SESSION_KEY = 'lang';
    const LOCALES = ['ar','fr','tr','de','ir'];
    
    public function handle($request, Closure $next) {

          if(\App::getLocale() == 'en'){
              \App::setLocale('de');
          }
          $session = $request->getSession();

          if (!$session->has(self::SESSION_KEY)) {

            $session->put(self::SESSION_KEY, 'de');
          }

          if ($request->has('lang')) {
            $lang = $request->get('lang');
            if (in_array($lang, self::LOCALES)) {
              $session->put(self::SESSION_KEY, $lang);
            }
          }

          app()->setLocale($session->get(self::SESSION_KEY));

          return $next($request);

    }
}
