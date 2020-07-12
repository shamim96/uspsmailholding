<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScriptHeader extends Model
{
    protected $fillable = ['name','script','status'];

    public function getUpdatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }

    public function getCreatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }
}
