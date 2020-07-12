<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = ['name','status'];

   /*
    * 1 = Cancelled
    * 2 = Open
    * 5 = Completed
    * 6 = Refunded
    * 7 = Hold Exist
    * 8 =Service Unavailable
    * 9 = Address Error
    * 10 = Over 30 Days Ahead
    * 11 = More Than 30 Days
    */

    public function getUpdatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }

    public function getCreatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }

}
