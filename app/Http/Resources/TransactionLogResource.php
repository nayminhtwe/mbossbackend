<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $arrayData = [
            'id' => $this->id,
            'amount' => $this->amount,
            'received' => $this->received,
            'transfer' => $this->transfer,
            'date' => $this->created_at->format('Y-m-d g:i A'),
        ];

        return $arrayData;
    }
}
