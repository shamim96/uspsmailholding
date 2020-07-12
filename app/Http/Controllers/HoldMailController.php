<?php

namespace App\Http\Controllers;


use App\BVS_GF_Entry;
use App\BVS_GF_ENTRY_META;
use App\Help;
use App\Mail\OrderConfirmation;
use App\Order;
use App\ScriptThankYou;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;
use App\Http\Controllers\AddressAPIController;

class HoldMailController extends Controller
{
    public function help(){
        return new Help();
    }

    private $oppwaUrl = "https://oppwa.com";
    private $entityId = "8acda4ca72e59f120172ea24a2233120";
    private $authorization = "OGFjZGE0Y2E3MmU1OWYxMjAxNzJlYTI0MGU3ZTMxMTd8UDlhZFd0elFiWg==";

    public function pageHoldMail(){
        $states = State::orderBy('STATE_NAME','asc')->get();
        return view('holdMail',compact('states'));
    }

    function createCheckoutId(Request $request)
    {
        $email = $request['email'];
        $txId = $this->help()->makeUniqueTxId();
        $url = $this->oppwaUrl."/v1/checkouts";
        $data = "entityId=".$this->entityId .
            "&amount=0.50" .
            "&currency=USD" .
            "&paymentType=DB".
            "&merchantTransactionId=".$txId.
            "&customer.email=".$email;


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer '.$this->authorization));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $paymentRequestJson = json_decode($responseData);
        $checkoutId = $paymentRequestJson->id;
        return $checkoutId;
    }


    public function holdMailTempData(Request $request){
       $request->session()->put('tempData',$request->all());
    }

    public function getAllTempData(){
        if(Session::get("tempData")){
           $tempData = Session::get("tempData");
           $tempData = $tempData['data'];
           return $tempData;
        }else{
            return false;
        }
    }

    public function removeTempDate(){
        if(Session::get("tempData")){
            $tempData = Session::forget("tempData");
        }
    }

    public function thankYou(Request $request){
        $error = false;
        $order = false;
        $scripts = false;
        $resourcePath = $request['resourcePath'];
        if(!$resourcePath){
           return redirect()->route('front.page.hold-mail');
        }
        $paymentStatus = $this->paymentStatus($resourcePath);
        if($paymentStatus->result->code == "000.000.000" || $paymentStatus->result->code == "000.100.112"){
            $order =  $this->createOrder($paymentStatus);
            $mailBody = $order->toArray();
            Mail::to($mailBody['email'])->send(new OrderConfirmation($mailBody));
            $this->help()->makeAlert("#".$order->id.' make an order','admin.orderDetails',$order->id);
            $scripts = ScriptThankYou::all();
        }else{
            $error = $paymentStatus->result->description;
        }
        $this->removeTempDate();
        return view('thankYou',compact('error','order','scripts'));

    }



    public function paymentStatus($resourcePath){

            $url = $this->oppwaUrl.$resourcePath;
            $url .= "?entityId=".$this->entityId;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization:Bearer '.$this->authorization));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
            $responseData = json_decode($responseData);
            return $responseData;
    }

    public function createOrder($paymentStatus){
        $data = $this->getAllTempData();

      $data['txId'] = $paymentStatus->merchantTransactionId;
      $data['paymentType'] = $paymentStatus->paymentType;
      $data['paymentBrand'] = $paymentStatus->paymentBrand;
      $data['amount'] = $paymentStatus->amount;
      $data['currency'] = $paymentStatus->currency;
      $data['descriptor'] = $paymentStatus->descriptor;
      $data['resultCode'] = $paymentStatus->result->code;
      $data['resultDescription'] = $paymentStatus->result->description;
//      $data['orderId'] = $paymentStatus->resultDetails->OrderID;
//      $data['termId'] = $paymentStatus->resultDetails->TermID;
      $data['cardLast4Digits'] = $paymentStatus->card->last4Digits;
      $data['cardHolder'] = $paymentStatus->card->holder;
      $data['customerIp'] = $paymentStatus->customer->ip;
      $data['customerIpCountry'] = $paymentStatus->customer->ipCountry;
      $data['ndc'] = $paymentStatus->ndc;
      $data['txId2'] = $paymentStatus->id;
      $order = Order::create($data);
      return $order;
    }

}
