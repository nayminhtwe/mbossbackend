<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerCompanyExtractFileRes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file',
        'app_user_id',
        'kyc_status',
        'seller_buyer_request_id'
    ];

    public function app_user()
    {
        return $this->belongsTo(AppUser::class);
    }

    public function seller_buyer_request()
    {
        return $this->belongsTo(SellerBuyerRequest::class);
    }
}
