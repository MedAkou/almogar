<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Options extends Base
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    public $table = 'options';

    /**
     * The attributes that are mass assignable.
     *
     * @var [type]
     */
    protected $fillable = [
        'key',
        'value',
        'store_id',
        'lang'
    ];

    /**
     * Determine if the given option value exists.
     *
     * @param  string  $key
     * @return bool
     */
    public function exists($key)
    {
        return self::Lang()->where('key', $key)->exists();
    }

    /**
     * Get the specified option value.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public function get($key, $default = null)
    {

        if ($option = self::Lang()->Merchant()->where('key', $key)->first()) {
            return $option->value;
        }

        return $default;
    }

    /**
     * Set a given option value.
     *
     * @param  array|string  $key
     * @param  mixed   $value
     * @return void
     */
    public function set($key, $value = null)
    {

        $store_id = \Auth::user()->store_id;
        
        $keys = is_array($key) ? $key : [$key => $value];

        $lang = \App::getLocale();

        foreach ($keys as $key => $value) {

            $data = [
                'key' => $key ,
                'value' => $value ,
                'lang' => $lang ,
                'store_id' => $store_id 
            ];

            $found = Self::Merchant()->where('lang',$lang)->where('key',$key)->first();
            if($found){
                $found->value = $value;
                $found->save();
            }else {
                self::create($data);
            }


        }
    }

    /**
     * Remove/delete the specified option value.
     *
     * @param  string  $key
     * @return bool
     */
    public function remove($key)
    {
        return (bool) self::Lang()->Merchant()->where('key', $key)->delete();
    }


}
