<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderListCollection;
use App\Http\Resources\OrderListResource;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    public function index(){
        return new OrderListCollection(OrderList::all());
    }

    public function show($id){
        return new OrderListResource(OrderList::all()->where('id','=',$id)->first());
    }

    public function store(Request $request){
        $order_list = new OrderList;

        $order_list->quantity = $request->quantity;
        $order_list->order_id = $request->orderId;
        $order_list->product_id = $request->productId;

        if($order_list->save()){
            return response()->json(['message'=>'Successfully Inserted!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot add Order'])->setStatusCode(400);
    }

    public function update(Request $request,$id){
        $order_list = OrderList::all()->where('id','=',$id)->first();
        $order_list->quantity = $request->quantity;
        $order_list->order_id = $request->orderId;
        $order_list->product_id = $request->productId;
        if($order_list->save()){
            return response()->json(['message'=>'Successfully Updated!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot update Order'])->setStatusCode(400);
    }

    public function destroy($id){
        $order_list = OrderList::all()->where('id','=',$id)->first();
        if($order_list->delete()){
            return response()->json(['message'=>'Successfully Deleted!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot delete order'])->setStatusCode(400);
    }
}
