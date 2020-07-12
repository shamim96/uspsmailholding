<?php

namespace App\Http\Controllers;

use App\Help;
use App\Order;
use App\OrderRenewalReminder;
use Illuminate\Http\Request;

class OrderRenewalReminderController extends Controller
{

    public function help(){
        return new Help();
    }
    public function index($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.orders.allReminders',compact('orderId','order'));
    }

    public function axiosAllRenewalDatesByOrder($orderId){
        $all = OrderRenewalReminder::where('orderId',$orderId)->orderBy('date','asc')->get();
        return $all;
    }

    public function updateRenewalDate(Request $request,$dateId){
        $date = OrderRenewalReminder::findOrFail($dateId);
        $date->update($request->all());
        return redirect()->back()->with('msg-success','Confirmation added');
    }


    public function allRenewalDates(){
        $all = OrderRenewalReminder::OrderBy('id','desc')->with(['order'=>function($query){
            $query->select('id','firstName','lastName','email','confirmation1','status');
        }])->paginate(10);
        $paginate = $this->help()->paginateData($all);

        return view('admin.renewals.allRenewals',compact('all','paginate'));
    }

    public function allRenewalByDate(Request $request){
        $paginate = false;
        if(isset($request['date'])){
            $today = $request['date'];
            $dateText = $today;
        }else{
            $today = date("Y-m-d");
            $dateText = "today";
        }

        $all = OrderRenewalReminder::OrderBy('id','desc')->where('date',$today)->with(['order'=>function($query){
            $query->select('id','firstName','lastName','email','confirmation1','status');
        }])->paginate(10);

        if(!isset($request['date'])){
            $paginate = $this->help()->paginateData($all);
        }
        return view('admin.renewals.allRenewals',compact('all','paginate','dateText'));
    }


    public function axiosSetNewRenewalDate(Request $request)
    {
        $request->validate([
           'newDate' => 'required',
            'orderId' => 'required'
        ]);

        OrderRenewalReminder::create([
            "orderId" => $request['orderId'],
            "date" => $request['newDate']
        ]);
    }

    public function axiosDeleteRenewalDatesByRenewalId($id){
        $date = OrderRenewalReminder::findOrFail($id);
        $date->delete();
    }

}
