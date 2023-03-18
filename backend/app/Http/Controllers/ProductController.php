<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return new ProductCollection(Product::all());
    }

    public function show($id){
        return new ProductResource(Product::all()->where('id','=',$id)->first());
    }

    public function store(Request $request){
        $product = new Product;
        $product->product_type_id = $request->productTypeId;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->name = $request->name;

        if($product->save()){
            return response()->json(['message'=>'Successfully Inserted!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot add Product'])->setStatusCode(400);
    }

    public function update(Request $request, $id){
        $product = Product::all()->where('id','=',$id)->first();
        $product->product_type_id = $request->productTypeId;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->name = $request->name;

        if($product->save()){
            return response()->json(['message'=>'Successfully updated!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot update Product'])->setStatusCode(400);
    }

    public function destroy($id){
        $product = Product::all()->where('id','=',$id)->first();
        if($product->delete()){
            return response()->json(['message'=>'Successfully Deleted!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot delete Product'])->setStatusCode(400);
    }
}
