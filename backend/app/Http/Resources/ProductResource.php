<?php

namespace App\Http\Resources;

use App\Models\ProductType;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'productId' => $this->id,
            'productType' => [
                "id"=> $this->product_type->id,
                "title"=>$this->product_type->title
            ],
            'price' => $this->price,
            'description' => $this->description,
            'name' => $this->name
        ];
    }
}
