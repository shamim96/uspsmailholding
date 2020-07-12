<?php

namespace App\Http\Controllers;

use App\alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function allAlerts(){
        $alerts = alert::orderBy('id','desc')->get();
        return $alerts;
    }

    public function notification($id){
        $alert = alert::findOrFail($id);
        $alert->update(['status'=>2]);
        if($alert->alert_link){
            return redirect($alert->alert_link);
        }
        return redirect()->back();
    }

    public function markAllRead(){
       alert::where('status',1)->update(['status'=>2]);
      return redirect()->back();
    }

    public function deleteAllAlert(){
        $alerts = alert::all();
        foreach ($alerts as $alert){
            $alert->delete();
        }
        return redirect()->back();
    }

}
