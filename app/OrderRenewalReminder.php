<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRenewalReminder extends Model
{
    protected $fillable = ['date','status', 'orderId','confirmation'];

    public function order(){
        return $this->belongsTo('App\Order','orderId');
    }

    public function getUpdatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }

    public function getCreatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }

    public function getDateAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y",$date);
    }
}
