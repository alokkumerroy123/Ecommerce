<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\validator;

class ProductController extends Controller
{
    //index.blade.php page view
    public function index(){
        $products=Product::orderBy('id','desc')->paginate(5);
        return view('backend.products.index',compact('products'));
    }
    
    //create.blade.php page view
    public function create(){
        return view('backend.products.create');
    }
    
    //data submit in database
    public function store(Request $request){

        //validation
      $validator=validator::make($request->all(),

[
    'name'=>'required|max:120',
    'price'=>'required|numeric',
    'description'=>'required',
    'discount'=>'required|numeric',
    'photo'=>'required|image',
]);
     if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } 

        //photo rename and photo upload
        $newName='product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move('uploads/products',$newName);

        $inputs=[
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'discount'=>$request->input('discount'),
            'description'=>$request->input('description'),
            'photo'=>$newName,

        ];

        Product::create($inputs);
        return redirect()->route('admin.product');

    }
    
    //edit page show
    public function edit($id){
        $product=Product::find($id);
        return view('backend.products.edit',compact('product'));
    }

    //edit data submit in database
    public function update(Request $request,$id){

            //validation
      $validator=validator::make($request->all(),

[
    'name'=>'required|max:120',
    'price'=>'required|numeric',
    'description'=>'required',
    'discount'=>'required|numeric',
    'photo'=>'image',
]);
     if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } 

        $inputs=[

            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'discount'=>$request->input('discount'),
            'description'=>$request->input('description'),

              ];
              $product=Product::find($id);
              $product->update($inputs);
              if(!empty($request->file('photo'))){
                if(file_exists('uploads/products/'.$product->photo)){
                    unlink('uploads/products/'.$product->photo);
                     }
                  $newName='product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
               
        $request->file('photo')->move('uploads/products',$newName);
        $product->update(['photo'=>$newName]);
              }
              return redirect()->route('admin.product');

         }

         public function delete($id){
            $product=Product::find($id);
             if(file_exists('uploads/products/'.$product->photo)){
                    unlink('uploads/products/'.$product->photo);
                     }
            $product->delete();
            return redirect()->route('admin.product');

         }


}
