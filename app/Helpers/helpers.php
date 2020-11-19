<?php 


//"App/Helpers/helpers.php"


if (! function_exists('option')) {
    /**
     * Get / set the specified option value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed|\Appstract\Options\Option
     */
    function option($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('option');
        }

        if (is_array($key)) {
            return app('option')->set($key);
        }

        return app('option')->get($key, $default);
    }
}

if (! function_exists('option_exists')) {
    /**
     * Check the specified option exits.
     *
     * @param  string  $key-
     * @return mixed
     */
    function option_exists($key)
    {
        return app('option')->exists($key);
    }
}



if (! function_exists('baseSetting')) {
    /**
     * Get / set the specified option value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed|\Appstract\Options\Option
     */
    function baseSetting($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('BaseSettings');
        }

        if (is_array($key)) {
            return app('BaseSettings')->set($key);
        }

        return app('BaseSettings')->get($key, $default);
    }
}

if (! function_exists('baseSettings_exists')) {
    /**
     * Check the specified option exits.
     *
     * @param  string  $key-
     * @return mixed
     */
    function baseSettings_exists($key)
    {
        return app('BaseSettings_exists')->exists($key);
    }
}























/*

function option(key){

	\App\Option::get($key)
	return 'dkdkjsdfskjfdds';
}
*/
/*
    function option($key = null, $default = null)
    {

    	$option = (new \App\Options());

        if (is_null($key)) {
            return $option;
        }

        if (is_array($key)) {
            return $option->set($key);
        }

        return $option->get($key, $default);
    }



// great idea 
/*

get all options for the



*/

function just_get_option($key){

	// get the local lang
	$lang = \App::getLocale();

	// get the store
	$store_id = \Session::get('store_id'); 
	 
	// get the option based in language and 
	//if(Auth::)

}






function doshithere(){
	echo "sdfmlsdmlfsqffdflqùfdffdqlkmflkdmqff";
}