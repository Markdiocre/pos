<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductTypeCollection;
use App\Http\Resources\ProductTypeResource;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index(){
        return new ProductTypeCollection(ProductType::all());
    }

    public function show($id){
        return new ProductTypeResource(ProductType::all()->where('id','=',$id)->first());
    }

    public function store(Request $request){
        $product_type = new ProductType;
        $product_type->title = $request->title;
        if($product_type->save()){
            return response()->json(['message'=>'Successfully Inserted!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot add Product Type'])->setStatusCode(400);
    }

    public function update(Request $request, $id){
        $product_type = ProductType::all()->where('id','=',$id)->first();
        $product_type->title = $request->title;
        if($product_type->save()){
            return response()->json(['message'=>'Successfully Updated!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot update Product Type'])->setStatusCode(400);
    }

    public function destroy($id){
        $product_type = ProductType::all()->where('id','=',$id)->first();
        if($product_type->delete()){
            return response()->json(['message'=>'Successfully Deleted!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot delete Product Type'])->setStatusCode(400);
    }
}
