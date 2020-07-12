<?php

namespace App\Http\Controllers;

use App\BVS_GF_Entry;
use App\BVS_GF_ENTRY_META;
use App\Contact;
use App\Order;
use Illuminate\Http\Request;

class BVS_Controller extends Controller
{



    public function createAllUnTrashForm2Order(){
        $entries = BVS_GF_Entry::where('form_id',2)->where('status','!=','trash')->get();
        foreach ($entries as $entry){
            $order = [];
            $order['id'] = $entry->id;
            $order['created_at'] = $entry->date_created ;
            $order['updated_at'] = $entry->date_updated ;
            $order['customerIp'] = $entry->ip ;
            $order['amount'] = $entry->payment_amount ;
            $order['txId'] = $entry->transaction_id ;
            $order['paymentBrand'] = $entry->payment_method ;
            $order['currency'] = $entry->currency ;
            Order::create($order);
        }
    }

    public function updateFirstNameLastName(){
        // 2 = First Name, 3 = Last, 7 = email, 15 = start date, 16 = end date , 6 = phone
        // 17 = How would you like to receive your mail after the end date - Carrier delivers accumulated mail - I will pick up accumulated mail
        // 18 additional instruction, 29 = Confirmation, 13 = state, 12 = city, 9 = street, 14= zip , 11 = apt
        // 28 status
        // 10.Over 30 Days Ahead - 1.Canceled - 9.Address Error - 5.Completed - 7.Hold Exist - 6.Refunded - 11.More Than 30 Days - 2.Open
        // 4. company

        $orders = Order::all();
        foreach ($orders as $order){
            $data['firstName'] = $this->getData($order->id,2);
            $data['lastName'] = $this->getData($order->id,3);
            $data['email'] = $this->getData($order->id,7);
            $data['startDate'] = $this->getData($order->id,15);
            $data['endDate'] = $this->getData($order->id,16);
            $data['phone'] = $this->getData($order->id,6);
            $receiveMail = $this->getData($order->id,17);
            $data['receiveMail'] = $receiveMail == "Carrier delivers accumulated mail" ? "1": "2";
            $data['additionalInformation'] = $this->getData($order->id,18);
            $data['confirmation1'] = $this->getData($order->id,29);
            $data['state'] = $this->getData($order->id,13);
            $data['city'] = $this->getData($order->id,12);
            $data['street'] = $this->getData($order->id,9);
            $data['zip'] = $this->getData($order->id,14);
            $data['apt'] = $this->getData($order->id,11);

            $company = $this->getData($order->id,4);
            if($company && !empty($company)){
                $data['businessAddress'] = 1;
                $data['company'] = $company;
            }else{
                $data['businessAddress'] = 0;
            }

            $status = $this->getData($order->id,28);
            if($status == "Over 30 Days Ahead"){
                $data['status'] = 10;
            }elseif($status == "Canceled"){
                $data['status'] = 1;
            }elseif($status == "Address Error"){
                $data['status'] = 9;
            }elseif($status == "Completed"){
                $data['status'] = 5;
            }elseif($status == "Hold Exist"){
                $data['status'] = 7;
            }elseif($status == "More Than 30 Days"){
                $data['status'] = 11;
            }elseif($status == "Open"){
                $data['status'] = 2;
            }elseif($status == "Service Unavailable"){
                $data['status'] = 8;
            }

            //update the order
            $order->update($data);
        }

    }

    private function getData($entryId,$metaKey, $formId = 2){
        $data =  BVS_GF_ENTRY_META::where('form_id',$formId)->where('entry_id',$entryId)->where('meta_key',$metaKey)->first();
        if($data && !empty($data)){
            return $data->meta_value;
        }
        return "";
    }

    public function makeAllContacts(){
        // form_id = 1,
        // 1 = name, 2 = email, 3 = message
        $contacts = BVS_GF_Entry::where("form_id",1)->where('status','active')->get();
        foreach ($contacts as $contact){
            $data['name'] = $this->getData($contact->id,1,1);
            $data['email'] = $this->getData($contact->id,2,1);
            $data['message'] = $this->getData($contact->id,3,1);
            $data['created_at'] = $contact->date_created;
            $data['status'] = 2;
           Contact::create($data);
        }


    }
}
