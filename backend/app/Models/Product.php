<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_type_id','price','description','name'];

    public function product_type(){
        return $this->belongsTo(ProductType::class);
    }
}
