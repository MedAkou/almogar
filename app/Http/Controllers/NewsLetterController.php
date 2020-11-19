<?php

namespace App\Http\Controllers;
use App\AdsManager;
use Illuminate\Http\Request;
use Newsletter;



class NewsLetterController extends Controller{



    public function subscribe(Request $request) {
        
        $apiKey = option('apiKey');
        $listID = option('listId');
         
        config(['newsletter.apiKey' => $apiKey]);
        config(['newsletter.lists.subscribers.id' => $listID]);

        $email = $request->email;

        if(!Newsletter::isSubscribed($email)){
            $result = Newsletter::subscribe($email);
        }

        return redirect()->route( 'home',['store' => $request->store]  )->with('success',trans('subscribed.success'));
    }


}
