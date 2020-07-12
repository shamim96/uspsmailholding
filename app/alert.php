<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alert extends Model
{
    protected $appends = ['alert_link'];
    private function help(){
      return new Help();
    }
    protected $fillable = [
        'userId', 'comment', 'route', 'routeId', 'link', 'status'
    ];

    public function getAlertLinkAttribute(){
        return  $this->help()->alertLink($this);
    }
    public function getCreatedAtAttribute($value){
       $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
      //  return date("F j, Y. g:i a",$date);
    }

    public function getUpdatedAtAttribute($value){
        $date = strtotime($value);
        return date("m-d-Y g:i a",$date);
    }
}
