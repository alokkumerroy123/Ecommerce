<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){

        $orders=Order::orderBy('id','desc')->paginate(10);
        return view('backend.orders.index',compact('orders'));
    }


     //admin view all order detail
    public function show($id){
          $order=Order::where('id',$id)->with('detail')->first();
          return view('backend.orders.show',compact('order'));
    }

        public function update(Request $request,$id){
        $order=Order::find($id);
        $order->update(['status'=>$request->input('status')]);
        return redirect()->back();
    }
}
