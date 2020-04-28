<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;    // add controller 
use App\Product;
use Validator;
class ProductController extends Controller
{
    public function save(Request $req){

        $validator = Validator::make($req->all(), [ 
            'name' => 'required|min:2', 
            'category' => 'required', 
            'price' => 'required', 
            
        ]);
if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $product=New Product;
        $product->name=$req->name;
        $product->category=$req->category;
        $product->price=$req->price;
       
        if($product->save()){
            return "product has been save successfully";
        }
        
    }

    public function update(Request $req){
        //return $req->input();
        $product = Product::find($req->id);
        $product->name=$req->name;
       // $product->category=$req->category;
        $product->price=$req->price;

        if($product->save()){
            return "data update successfully";
        }
    }
}
