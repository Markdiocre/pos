<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "orderId" => $this->id,
            "user" => new UserResource($this->user),
            "customerName" => $this->customer_name,
            "orderStatus" => $this->order_status,
            "orderedAt" => $this->ordered_at,
            "orderCode" => $this->order_code,
            "orderList"=>new OrderListResource($this->order_list)
        ];
    }
}
