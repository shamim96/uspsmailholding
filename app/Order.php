<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
class Order extends Model
{
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'orders.id' => 1,
            'orders.txId' => 2,
            'orders.email' => 3,
            'orders.firstName' => 4,
            'orders.lastName' => 5,
            'orders.startDate' => 6,
            'orders.endDate' => 7,
            'orders.phone' => 8,
            'orders.confirmation1' => 9,
            'orders.confirmation2' => 10,
            'orders.customerIp' => 11,
            'orders.txId2' => 12,
        ],

    ];

    protected $fillable = ['id','created_at','updated_at','txId', 'firstName', 'lastName', 'businessAddress', 'company', 'startDate', 'endDate', 'phone', 'email', 'street', 'apt', 'city','state','zip','receiveMail','additionalInformation','status', 'paymentType', 'paymentBrand', 'amount','currency', 'descriptor', 'resultCode','resultDescription', 'orderId', 'termId','cardLast4Digits', 'cardHolder', 'customerIp','customerIpCountry', 'timestamp', 'ndc','confirmation1', 'confirmation2','txId2','updated','cancelled'];

    public function orderStatus(){
        return $this->belongsTo('App\OrderStatus','status');
    }

    public function renewalDates(){
     return $this->hasMany('App\OrderRenewalReminder','orderId')->orderBy('date','asc');
    }

    public function getUpdatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }

    public function getCreatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }


    public function getStartDateAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y",$date);
    }

    public function getEndDateAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y",$date);
    }







}
