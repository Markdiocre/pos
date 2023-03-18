<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        return new OrderCollection(Order::all());
    }

    public function show($id){
        $orders = Order::all()->where('id','=',$id)->first();
        return new OrderResource($orders);
    }

    public function store(Request $request){
        $order = new Order;

        $order->user_id = $request->userId;
        $order->customer_name = $request->customerName;
        $order->order_status = 'p';
        $order->ordered_at = Carbon::today();
        $order->order_code = fake()->numerify('order-######');

        if($order->save()){
            return response()->json(['message'=>'Successfully Inserted!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot add Order'])->setStatusCode(400);
    }

    public function update(Request $request,$id){
        $order = Order::all()->where('id','=',$id)->first();
        $order->customer_name = $request->customerName;
        $order->order_status = $request->orderStatus;

        if($order->save()){
            return response()->json(['message'=>'Successfully Updated!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot update Order'])->setStatusCode(400);
    }

    public function destroy($id){
        $order = Order::all()->where('id','=',$id)->first();
        if($order->delete()){
            return response()->json(['message'=>'Successfully Deleted!'])->setStatusCode(200);
        }

        return response()->json(['message'=>'Error, cannot delete order'])->setStatusCode(400);
    }
}
