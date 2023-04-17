<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParafUpdateResource extends JsonResource
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
            'name'=> $this->name,
            'company'=> $this->company,
            'quantity'=> $this->quantity,
            'volume'=> $this->volume,
            'value'=> $this->value,
            'yesterday'=> $this->yesterday,
            'first'=> $this->first,
            'last_transaction_amount'=> $this->last_transaction_amount,
            'the_last_deal_change'=> $this->the_last_deal_change,
            'last_transaction_percentage'=> $this->last_transaction_percentage,
            'final_price_quantity'=> $this->final_price_quantity,
            'final_price_change'=> $this->final_price_change,
            'final_price_percent'=> $this->final_price_percent,
            'the_least'=> $this->the_least,
            'the_most'=> $this->the_most,
            'date'=> $this->date,
            
        ];
    }
}
