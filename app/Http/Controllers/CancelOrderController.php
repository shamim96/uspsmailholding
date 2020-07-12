<?php

namespace App\Http\Controllers;

use App\Help;
use App\Mail\OrderCancelConfirmationMail;
use App\Mail\OrderUpdateConfirmationMail;
use App\Order;
use App\ScriptDispute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CancelOrderController extends Controller
{
    public function help(){
        return new Help();
    }
    public function cancelUpdatePage(){
        $order = false;
        return view('cancelUpdate',compact('order'));
    }

    public function cancelUpdatePagePost(Request $request){
       $order = Order::where('id',$request['id'])->where('email',$request['email'])->first();
       if(!$order || empty($order)){
           $request->session()->flash('msg-danger','Your order not found');
           return redirect()->back();
       }
        $addi = $order->additionalInformation;
        $startDateUpdatePossible = $order->startDate > date('Y-m-d') ? "2" : "1";
        $endDateUpdatePossible = $order->endDate > date('Y-m-d') ? "2" : "1";
       return view('cancelUpdate',compact('order','endDateUpdatePossible','startDateUpdatePossible','addi'));
    }

    public function cancelHoldMail(Request $request){
        $order = Order::where('id',$request['id'])->where('email',$request['email'])->first();
        $scripts = false;
        $cancelled = false;
        if(!$order || $order->status == 1){
           $request->session()->flash('msg-danger','Something went wrong! Try again.');
           return redirect()->route('front.cancelUpdatePage');
        }
        $startDateUpdatePossible = $order->startDate > date('Y-m-d') ? "2" : "1";
        $endDateUpdatePossible = $order->endDate > date('Y-m-d') ? "2" : "1";

        if($endDateUpdatePossible == "2"){
            $order->update(['cancelled'=>2]);
            $cancelled = true;
            $mailBody = $order->toArray();
            Mail::to($order->email)->send(new OrderCancelConfirmationMail($mailBody));
            $this->help()->makeAlert("#". $order->id." cancelled his/her mail holding.",'admin.orderDetails',$order->id);
            $request->session()->flash('msg-success','You have successfully cancelled your mail holding');
            $scripts = ScriptDispute::all();
        }else{
            $request->session()->flash('msg-danger','Something wrong! Can not cancelled.');
        }

        return view('cancelUpdate',compact('order','endDateUpdatePossible','startDateUpdatePossible','cancelled','scripts'));

    }

    public function updateHoldMail(Request $request){

            $order = Order::where('id',$request['userOrderId'])->where('email',$request['userEmail'])->first();
            if($order){
                $update =  $order->update(['startDate'=>$request['startDate'],'endDate'=>$request['endDate'] , 'additionalInformation'=>$request['additionalInformation'], 'updated' => 2]);
            }
            if($order && $update){
                $this->help()->makeAlert("#".$order->id." updated his/her mail holding.",'admin.orderDetails',$order->id);
                $mailBody = $order->toArray();
                Mail::to($order->email)->send(new OrderUpdateConfirmationMail($mailBody));
                return $update;
            }
            return false;
    }
}
