<?php

namespace App\Http\Controllers;

use App\OrderStatus;
use Illuminate\Http\Request;
use Session;

class OrderStatusesController extends Controller
{

    public function index()
    {
       $statuses = OrderStatus::all();
        return view('admin.status.all',compact('statuses'));
    }


    public function create()
    {
      return view('admin.status.create');
    }


    public function store(Request $request)
    {
        OrderStatus::create($request->all());
        $request->session()->flash('msg-success','Status created');
        return redirect()->back();
    }



    public function edit($id)
    {
        $status = OrderStatus::findOrFail($id);
        return view('admin.status.edit',compact('status'));
    }

    public function update(Request $request, $id)
    {
        $status = OrderStatus::findOrFail($id);
        $status->update($request->all());
        $request->session()->flash('msg-success','Status updated');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $status = OrderStatus::findOrFail($id);
        if($status->id < 3){
            Session::flash('msg-danger','Sorry! can not delete this status');
            return redirect()->back();
        }
        $status->delete();
        Session::flash('msg-danger','Status updated');
        return redirect()->back();
    }

    public function axiosAllStatuses(){
        $statuses = OrderStatus::orderBy('name','asc')->select(['name','id'])->get();
        return json_encode($statuses);
    }
}
