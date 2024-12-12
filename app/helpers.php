<?php

if(!function_exists('otp')){
    function otp(Int $int = 4){
        return (int)substr(str_repeat(random_int(1111,9999),$int),0,$int);
    }
}

if(!function_exists('is_https')){
    function is_https($value){
        $regex = "/^https?:\\/\\/(?:www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/";
        return preg_match($regex, $value);
    }
}

if(!function_exists('mypolicy')){
    function mypolicy($model,$action)
    {
        return App\Models\Permission::Permission($model,$action);
    }
}