<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class OrderProduct extends Model
{
    public function product(){
        return Product::find($this->product_id);
    }
}