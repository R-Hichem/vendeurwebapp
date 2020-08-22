<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderProducts(){
        return $this->hasMany('App\OrderProduct')->get();
    }

    public function getTotalOrder(){
        $somme = 0;

        foreach ($this->orderProducts() as $orderProduct) {
            $somme += $orderProduct->quantity * $orderProduct->product()->unit_price;
        }

        return $somme;
    }
}