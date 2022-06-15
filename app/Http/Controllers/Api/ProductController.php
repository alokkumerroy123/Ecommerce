<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{

    public function index(){

        try{
    
            $products=Product::all();
            return response()->json([
                
                'success'=>true,
                'message'=>"All product list",
                'data'=>$products
               
            ]);
    
        }catch(\Excepation $exception){
            return response()->json([
                'success'=>false,
                'message'=>$exception->getMessage(),
            ]);
    
        }
      
       }
    
       
    
       public function show($id){
        try{ 
    
            $product=Product::find($id);
    
            if($product){
                return response()->json([
                    'success'=>true,
                    'message'=>"Product show",
                    'data'=>$product,
                ]);
    
            }
            return response()->json([
                'success'=>false,
                'message'=>"Product Not found",
            ]);
    
    
        }catch(\Exception $exception){
    
            return response()->json([
                'success'=>false,
                'message'=>$exception->getMessage(),
            ]);
    
        }
       }
    
    
       public function store(Request $request){
    
        try{
    
        $validator=validator::make($request->all(),
    
        [
              
                    'name' => 'required|max:255',
                    'price' => 'required|numeric',
                    'discount'=>'required|numeric',
                    'description'=>'required',
                    'photo'=>'required|image',
                    
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'success'=>false,
                        'message'=>$validator->getMessageBag(),
                    ]);
                }
         
        $newName='Product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move('uploads/products',$newName);
               
        
            $inputs=[
                'name'=>$request->input('name'),
                'price'=>$request->input('price'),
                'discount'=>$request->input('discount'),
                'description'=>$request->input('description'),
                'photo'=>$newName,
                
            ];
           $product=Product::create($inputs);
           return response()->json([
                
            'success'=>true,
            'message'=>"product create",
            'data'=>$product,
           
        ]);
        }catch(\Exception $exception){
    
            return response()->json([
                'success'=>false,
                'message'=>$gxception->getMessage(),
            ]);
    
        }
    
       }
    
       public function update(Request $request,$id){
    
        try{
    
            
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
                return response()->json([
                    'success'=>false,
                    'message'=>$validator->getMessageBag(),
                ]);
            }
                  $inputs=[
          
                      'name'=>$request->input('name'),
                      'price'=>$request->input('price'),
                      'discount'=>$request->input('discount'),
                      'description'=>$request->input('description'),
          
                        ];
                        $product=Product::find($id);
                        if(!$product){
                            return response()->json([
                                'success'=>true,
                                'message'=>"Product Not found",
    
                            ]);
                        }
                        $product->update($inputs);
                        if(!empty($request->file('photo'))){
                          if(file_exists('uploads/products/'.$product->photo)){
                              unlink('uploads/products/'.$product->photo);
                               }
                            $newName='product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
                         
                  $request->file('photo')->move('uploads/products',$newName);
                  $product->update(['photo'=>$newName]);
                        }
                     return response()->json([
                        'success'=>true,
                        'message'=>"Product Update",
                        'data'=>$product,
                     ]);
    
        }catch(\Exception $excpetion){
            return response()->json([
                'success'=>false,
                'message'=>$exception->getMessage(),
            ]);
    
        }
    
       }
    
       public function delete($id){
        
        try{
    
            $product=Product::find($id);
            if(file_exists('uploads/products/'.$product->photo)){
                   unlink('uploads/products/'.$product->photo);
                    }
                    $product->delete();
                    return response()->json([
                        'success'=>true,
                        'message'=>"Product Delete",
    
                    ]);
     
        }catch(\Exception $excpetion){
    
            return response()->json([
                'success'=>false,
                'message'=>$exception->getMessage(),
            ]);
    
    
        }
       }
       
    
}
