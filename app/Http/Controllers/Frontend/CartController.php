<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class CartController extends Controller
{
    public function addCart($id){

        $cart=session()->has('cart')?session()->get('cart'):[];
        $product= Product::find($id);

        if(key_exists($product->id,$cart)){
            $cart[$product->id]['quantity'] = $cart[$product->id]['quantity']+1;
        }else{
           
            $cart[$product->id]=[
                
                'product_id'=>$product->id,
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=>1,
                
            ];
        }

        session(['cart'=>$cart]);
        session()->flash('message','product added to cart');
        session()->flash('alert','success');
        return redirect()->back();


    }

    //show cart
    public function show(){
      $cart=session()->has('cart')?session()->get('cart'):[];
      return view('frontend.cart',compact('cart'));
  }

  public function checkout(){

   $cart=session()->has('cart')?session()->get('cart'):[];
   return view('frontend.checkout',compact('cart'));

}

public function order(Request $request){ 


    try{ 

       DB::beginTransaction();

       $carts=session()->has('cart')?session()->get('cart'):[];

      //validation
       $validator=validator::make($request->all(),

        [
            'name'=>'required|max:120',
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required',
            'payment_method'=>'required', 
            'txn_id'=>'required',
        ]);
       if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    } 

    $inputs=[
        'user_id'=>auth()->user()->id,
        'name'=>$request->input('name'),
        'phone'=>$request->input('phone'),
        'address'=>$request->input('address'),
        'email'=>$request->input('email'),
        'payment_method'=>$request->input('payment_method'),
        'txn_id'=>$request->input('txn_id'),
        'price'=>$request->input('price'),
        'quantity'=>$request->input('quantity'),
        'truck_no'=>'07_'.time(),

    ];

    $order=Order::create($inputs);
    foreach($carts as $cart){
        OrderDetail::create([
           
           'order_id'=>$order->id,
           'product_id'=>$cart['product_id'],
           'name'=>$cart['name'],
           'price'=>$cart['price'],
           'quantity'=>$cart['quantity'],


       ]);
    } 

    session()->forget('cart');
    Mail::to(auth()->user()->email)->send(new OrderMail($order));

    DB::commit();
    return redirect()->route('profile');
    


}catch(\Exception $exception){ 

    DB::rollBack();

    dd($exception->getMessage());

}



}
}







