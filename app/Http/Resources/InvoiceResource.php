<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CategoryResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'authorID' => $this->app_user_id,
            'authorName' => $this->title,
            'authorProfilePic' => asset('img/brand/unknown-pic.jpeg'),
            'merchantID' => $this->category->id,
            'merchantPhoto' => $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] . Storage::url($this->category->images->first()->image),
            'merchantTitle' => $this->category->name,
            'description' => $this->description,
            'filters' => '',
            'id' => $this->uuid,
            'mboss_id' => 'M'.$this->id.'@'.$this->created_at->year,
            'place' => $this->place,
            'origin_invoice_amount' => $this->price,
            'purchase_amount' => $this->purchase_amount,
            'receivable_amount' => $this->receivable_amount,
            'profit' => null,
            'discount' => $this->discount,
            'reviewsCount' => 1,
            'reviewsSum' => 5,
            'saved' => false,
            'invoiceID' => $this->title,
            'terms' => $this->terms,
            'due' => $this->date,
            'purchase_status' => $this->purchase,
            'invoice_issued_date' => $this->invoice_issued_date,
            'invoice_selling_date' => $this->invoice_selling_date,
            'remaining_day' => $this->remaining_day,
            'day_delays' => $this->day_delays,
            'daily_discount_rate' => $this->daily_discount_rate,
            'seller_discount_rate' => $this->seller_discount_rate,
            'discounted_amount' => $this->discounted_amount,
            'service_fees' => $this->service_fees,
            'seller_receivable_amount' => $this->seller_receivable_amount,
            'seller_approval' => $this->seller_approval
            // 'original_invoice' => $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] . Storage::url($this->photos->photo)
        ];

        $arrayData['createdAt'] = (object) [
            'nanoseconds' => (int) Carbon::parse($this->created_at)->isoFormat('SSSSSSSSS'),
            'seconds'   => $this->created_at->timestamp,
        ];

        if ($this->status == 1) {
            $arrayData['isApproved'] = true;
        } elseif ($this->status == 0) {
            $arrayData['isApproved'] = false;
        }

        if ($this->cover_photo != null) {
            // $arrayData['photo'] = new InvoicePhotoResource($this->photos->first());
            $arrayData['photo'] = $this->cover_photo->photo;
        } else {
            $arrayData['photo'] = null;
        }

        if ($this->purchase_order != null) {
            $arrayData['purchase_order'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] . Storage::url($this->purchase_order);
        } else {
            $arrayData['purchase_order'] = null;
        }

        if ($this->contract != null) {
            $arrayData['contract'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] . Storage::url($this->contract);
        } else {
            $arrayData['contract'] = null;
        }

        if ($this->other != null) {
            $arrayData['other'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] . Storage::url($this->other);
        } else {
            $arrayData['other'] = null;
        }

        if ($this->invoice_excel != null) {
            $arrayData['invoice_excel'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] . Storage::url($this->invoice_excel);
        } else {
            $arrayData['invoice_excel'] = null;
        }

        if ($this->payment_record != null) {
            $arrayData['payment_record'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] . Storage::url($this->payment_record);
        } else {
            $arrayData['payment_record'] = null;
        }

        if ($this->photos != null) {
            $arrayData['original_invoice'] = new InvoicePhotoResourceCollection($this->photos);
        } else {
            $arrayData['original_invoice'] = null;
        }

        return $arrayData;
    }
}
