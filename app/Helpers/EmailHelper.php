<?php


namespace App\Helpers;


class EmailHelper {
    private static $to;
    private static $with;
    private static $subject;
    private static $email;

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
        $url = 'https://api.elasticemail.com/v2/email/send';
        try{
            $post = array('from' => 'contact@3now.de',
            'fromName' => '3now',
            'apikey' => '9ECAE3B0E7E28B94621D30D634B0238ACC12BE45DA5CC17DEC385C99EE08C9212403CDE46FE482701696293D221895D8',
            'subject' => self::$subject,
            'to' => self::$to,
            'bodyHtml' => view(self::$email, self::$with),
            'isTransactional' => false);

            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
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