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
            'productType' => new ProductTypeResource($this->product_type),
            'price' => $this->price,
            'description' => $this->description,
            'name' => $this->name
        ];
    }
}
