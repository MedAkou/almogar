<?php


namespace App\Helpers;


class EmailHelper {
    private static $to;
    private static $with;
    private static $email;
    private static $subject;
    private static $API_KEY;
    private static $from = 'contact@3now.de';
    private static $fromName = '3now';
    private static $CURLOPT_URL = 'https://api.elasticemail.com/v2/email/send';

    public function __construct(){
        self::$API_KEY  = env('ELASTIC_API_KEY');
    }

    public static function to($to){
        self::$to = $to;
        return new self;
    }

    public static function with($with){
        self::$with = $with;;
        return new self;
    }

    public static function email($email){
        self::$email = $email;
        return new self;
    }

    public static function subject($subject){
        self::$subject = $subject;
        return new self;
    }

    public static function send(){
        try{
            $post = array(  'from' => self::$from,
                            'fromName' => self::$fromName,
                            'apikey' => self::$API_KEY,
                            'subject' => self::$subject,
                            'to' => self::$to,
                            'bodyHtml' => view(self::$email, self::$with),
                            'isTransactional' => false
                        );

            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => self::$CURLOPT_URL,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $post,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_SSL_VERIFYPEER => false
            ));

            $result=curl_exec ($ch);
            curl_close ($ch);
            return true;
        }catch(Exception $ex){
            echo $ex->getMessage();
            return false;
        }
    }

}