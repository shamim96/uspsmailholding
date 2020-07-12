<?php

namespace App\Http\Controllers;

use App\AddressAPI;
use Illuminate\Http\Request;

class AddressAPIController extends Controller
{

    public function index()
    {
        $all = AddressAPI::orderBy('id','asc')->get();
        return view('admin.addressApi.all',compact('all'));
    }

    public function create()
    {
        return view('admin.addressApi.add');
    }


    public function store(Request $request)
    {
        AddressAPI::create($request->all());

        return redirect()->back()->with('msg-success','API saved!');

    }


    public function edit($id)
    {
        $api = AddressAPI::findOrFail($id);
        return view('admin.addressApi.edit',compact('api'));

    }


    public function update(Request $request, $id)
    {
        $api = AddressAPI::findOrFail($id);
        $api->update($request->all());
        return redirect()->back()->with('msg-success','API updated!');
    }


    public function destroy($id)
    {
        $api = AddressAPI::findOrFail($id);
        $api->delete();
        return redirect()->back()->with('msg-danger','API deleted!');
    }
// Front End
    public function getCurrentApi(){
        $api = AddressAPI::where('status',2)->orderBy('id','asc')->first();
        if($api && ($api->uses > 480 || $api->endDate <= date('Y-md'))){
             $api->update(['status'=>1]);
           return $this->getCurrentApi();
        }elseif($api){
            $api->update(['uses'=>$api->uses + 1]);
            return $api->api;
        }
        return false;
    }



}
