<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'app_user_id',
        'status',
        'uuid',
        'place',
        'terms',
        'purchase_order',
        'contract',
        'other',
        'invoice_excel',
        'payment_record',
        'purchase_amount',
        'receivable_amount',
        'date',
        'discount',
        'purchase',
        'purchase_at',
        'purchase_app_user_id',
        'finish_status',
        'payer',
        'invoice_issued_date',
        'invoice_selling_date',
        'remaining_day',
        'daily_discount_rate',
        'seller_discount_rate',
        'discounted_amount',
        'service_fees',
        'seller_receivable_amount',
        'seller_approval',
        'day_delays',
        'seller_approval'
    ];

    public function photos()
    {
        return $this->hasMany(InvoicePhoto::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function app_user()
    {
        return $this->belongsTo(AppUser::class);
    }

    public function cover_photo()
    {
        return $this->hasOne(InvoiceCoverPhoto::class);
    }

    public function purchase_order_image()
    {
        return $this->hasMany(InvoicePurchaseOrderImage::class);
    }

    public function contract_image()
    {
        return $this->hasMany(InvoiceContractImage::class);
    }

    public function other_image()
    {
        return $this->hasMany(InvoiceOtherImage::class);
    }

    public function invoice_excel_image()
    {
        return $this->hasMany(InvoiceExcelImage::class);
    }

    public function payment_record_image()
    {
        return $this->hasMany(InvoicePaymentRecordImage::class);
    }
}
