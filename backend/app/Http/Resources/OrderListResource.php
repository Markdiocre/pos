<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderListResource extends JsonResource
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
            "orderListId" => $this->id,
            "quantity" => $this->quantity,
            "order"=>new OrderResource($this->order),
            "product"=>new ProductResource($this->product)

        ];
    }
}
