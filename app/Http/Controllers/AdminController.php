<?php

namespace App\Http\Controllers;

use App\Help;
use App\Order;
use App\OrderStatus;
use App\State;
use Illuminate\Http\Request;
use Session;
use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
   private $specificColumns = ['id', 'firstName', 'lastName', 'status','email','created_at','confirmation1'];

    public function help(){
        return new Help();
    }
    public function index(){
        return redirect()->route('admin.allRenewalByDate');
       // return view('admin.index');
    }

    public function allOrders(){
        $orders = Order::orderBy("id",'desc')->select($this->specificColumns)->paginate(10);
        $paginate = $this->help()->paginateData($orders);
        return view('admin.orders.allOrders',compact('orders','paginate'));
    }

    public function allCancelledOrders(){
        $cancelled = true;
        $orders = Order::orderBy("id",'desc')->where('status','!=',1)->where('cancelled',2)->select($this->specificColumns)->paginate(10);
        $paginate = $this->help()->paginateData($orders);
        return view('admin.orders.allOrders',compact('orders','paginate','cancelled'));
    }
    public function allUpdatedOrders(){
        $updated = true;
        $orders = Order::orderBy("id",'desc')->where('status',"!=",'1')->where('updated', 2)->select($this->specificColumns)->paginate(10);
        $paginate = $this->help()->paginateData($orders);
        return view('admin.orders.allOrders',compact('orders','paginate','updated'));
    }

    public function allOrdersByStatus($statusId){
        $status = OrderStatus::findOrFail($statusId);
        $status = $status;
        $orders = Order::orderBy("id",'desc')->where('status',$statusId)->select($this->specificColumns)->paginate(10);
        $paginate = $this->help()->paginateData($orders);
        return view('admin.orders.allOrders',compact('orders','paginate','status'));
    }
    public function searchAllOrders(Request $request){
        $searchType = $request['searchType'];
        $query = $request['query'];
        if((!$searchType && !$query) || ($searchType && !$query)){
            return redirect()->back()->with('msg-danger','Search appropriately!');
        }
        if($searchType){
            $orders= Order::where($searchType,$query)->get();
        }else{
            $orders = Order::search($query)->orderBy("id",'desc')->select($this->specificColumns)->get();
        }
        return view('admin.orders.allOrders',compact('orders'));
    }
    public function orderDetails($id){
        $order = Order::findOrFail($id);
        $renewalDates = $order->renewalDates;
        return view('admin.orders.orderDetails',compact('order','renewalDates'));
    }

    public function editOrder($id){
        $statuses = OrderStatus::orderBy('id','asc')->get();
        $order = Order::findOrFail($id);
        $states = State::orderBy("STATE_NAME",'asc')->get();
        return view('admin.orders.editOrder',compact('order','statuses','states'));
    }

    public function updateOrder(Request $request, $id){
        if(!$request['businessAddress']){
            $request['businessAddress'] = "0";
        }

        $order = Order::findOrFail($id);
        $order->update($request->all());
        Session::flash('msg-success','Order updated');
        return redirect()->back();
    }

    public function deleteOrder($id){
        $order = Order::findOrFail($id);
        $order->delete();
        Session::flash('msg-danger','Order deleted');
        return redirect()->back();
    }
}
