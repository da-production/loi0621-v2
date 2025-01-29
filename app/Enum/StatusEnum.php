<?php

namespace App\Enum;

enum StatusEnum : string {

    case SUCCESS = "success";
    case FAIL = "fail";

    public function label(){
        return match($this){
            self::SUCCESS => "succès",
            self::FAIL => "échouer",
        };
    }
}