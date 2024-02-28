<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use LDAP\Result;

class ProductController extends Controller
{
    function addProduct(Request $request){

        $product=new Product;
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        $product->file_path=$request->file('file')->store('products');
        $product->save();
        return $product;
    }
    function list(){
        return Product::all();
    }
    function delete($id){
        $result=Product::where('id',$id)->delete();
        if($result){
            return ['result'=>"Product has been deleted"];
        }
        return ['result'=>'Operation Failed'];

    }
}
