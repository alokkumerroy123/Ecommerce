<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index(){

        $products=Product::paginate(6);
        return view('frontend.home',compact('products'));
    }
}
