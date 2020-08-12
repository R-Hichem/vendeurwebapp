<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "code" =>  $this->code,
            "client_name" =>  $this->client_name,
            "ammount" =>  $this->ammount,
            "payed" =>  $this->payed,
            "shipped" =>  $this->shipped,
            "created_at" =>  $this->created_at->format('Y-m-d'),
            "updated_at" =>  $this->updated_at->format('Y-m-d')
        ];
    }
}