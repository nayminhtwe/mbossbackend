<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SellerBuyerRequestResource extends JsonResource
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
            'app_user_id' => $this->app_user_id,
            'seller_upload_count' => $this->seller_upload_count,
            'buyer_upload_count' => $this->buyer_upload_count,
            'kyc_status' => $this->kyc_status,
            'seller_finish_status' => $this->seller_finish_status,
            'buyer_finish_status' => $this->buyer_finish_status
            ];

        return $arrayData;
    }
}
