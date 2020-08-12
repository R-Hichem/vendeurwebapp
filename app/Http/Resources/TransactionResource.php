<?php

namespace App\Http\Resources;

use App\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" =>  $this->id,
            "user_id" =>  $this->user_id,
            "order_id" =>  $this->order_id,
            'order_object' => new OrderResource(Order::find($this->order_id)),
            "created_at" =>  $this->created_at->format('Y-m-d'),
            "updated_at" =>  $this->updated_at->format('Y-m-d')
        ];
    }
}