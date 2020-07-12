<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Help;
use App\Mail\ContactFormSubmitConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;


class ContactController extends Controller
{
    public function help(){
        return new Help();
    }
    public function contact(){
        return view('contact');
    }
    public function store(Request $request){
//        $captchaVerify = $this->help()->captchaVerify($request);
//        if(!$captchaVerify){
//            return redirect()->route('home');
//        }
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['phone'] = $request['phone'];
        $data['subject'] = $request['subject'];
        $data['message'] = $request['message'];

        $contact = Contact::create($data);
        $mailBody = ['name'=>$contact->name];
        Mail::to($contact->email)->send(new ContactFormSubmitConfirmation($mailBody));
        $this->help()->makeAlert($contact->name." sent a message",'admin.contactDetails',$contact->id);
//        $request->session()->flash('msg-success','Thank you for messaging us. We will contact you soon');


    }

    public function all(){
        $contacts = Contact::OrderBy('id','desc')->paginate(10);
        return view('admin.contacts',compact('contacts'));
    }

    public function contactById($id){
        $contact = Contact::findOrFail($id);
        $contact->update(["status"=>2]);
        return view('admin.contactDetails',compact('contact'));
    }

    public function deleteContact($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        Session::flash('msg-danger','Message deleted');
        return redirect()->back();
    }
}
