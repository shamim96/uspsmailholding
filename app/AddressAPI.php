<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressAPI extends Model
{
    protected $fillable = ["email", "api", "status", "uses","endDate"];

    public function getUpdatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }

    public function getCreatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }

}


