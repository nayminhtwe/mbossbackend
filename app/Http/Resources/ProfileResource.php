<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\SellerBuyerRequest;

class ProfileResource extends JsonResource
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
            'userID' => $this->userID,
            'phone' => $this->phone,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'nrc' => $this->nrc,
            'currentAddress' => $this->currentAddress,
            'permanentAddress' => $this->permanentAddress,
            'date_of_birth' => $this->date_of_birth,
            'age' => $this->age,
            'bankName' => $this->bankName,
            'bankAcc' => $this->bankAcc,
            'bankNameOptional' => $this->bankNameOptional,
            'bankAccOptional' => $this->bankAccOptional,
            'profilePictureURL' => $this->profilePictureURL,
            'seller_buyer_status' => $this->seller_buyer_status,
            'seller_status' => $this->seller_status,
            'buyer_status' => $this->buyer_status,
            'seller_pending' => $this->seller_pending,
            'seller_request_count' => $this->seller_request_count,
            'buyer_request_count' => $this->buyer_request_count,
            'seller_submitted' => $this->seller_submitted,
            'buyer_submitted' => $this->buyer_submitted,
            'finish_status' => new SellerBuyerRequestResource(SellerBuyerRequest::where('app_user_id', $this->id)->orderBy('id', 'DESC')->first()),
            'wallet' => $this->wallet
        ];

        return $arrayData;
    }
}
