@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Show Detail Invoice'))

@section('content')
<x-backend.card>
    <x-slot name="header">

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action btn btn-info" style="color:white" :href="route('admin.invoice.index')" :text="__('Back to Pending Invoice')" />
            <x-utils.link class="card-header-action btn btn-info" style="color:white" :href="route('admin.invoice.finished')" :text="__('Back to Created Invoice')" />
            <x-utils.link class="card-header-action btn btn-info" style="color:white" :href="route('admin.invoice.seller_approved_invoice_list')" :text="__('Back to Approved Invoice')" />
        </x-slot>
        
    </x-slot>

    <x-slot name="body">

        <ul class="list-group">
            <li class="list-group-item h3">
                <strong>
                    @lang('Invoice ID ') : {{ $invoice->title }}
                </strong>
            </li>
            <li class="list-group-item">@lang('App User Name') : {{ $invoice->app_user->firstName }}</li>
            <li class="list-group-item">@lang('Description') : {{ $invoice->description }}</li>
            <li class="list-group-item">@lang('Origin Invoice Amount') : {{ $invoice->price }}</li>
            <li class="list-group-item">@lang('Payer Name') : {{ $invoice->category->name }}</li>
            <li class="list-group-item">@lang('Terms') : {{ $invoice->terms }}</li>
            <li class="list-group-item">@lang('Due Date') : {{ $invoice->date }}</li>

            <li>
                <div class="h4 form-group row col-md-2" style="text-decoration: underline">
                    @lang('For Buyer Pricing')
                </div>
                <li class="list-group-item">@lang('Purchase Amount') : {{ $invoice->purchase_amount }}</li>
                <li class="list-group-item">@lang('Receivable Amount') : {{ $invoice->receivable_amount }}</li>
                <li class="list-group-item">@lang('Discount Rate') : {{ $invoice->discount }} %</li>
            </li>
            

            <li>
                <div class="h4 form-group row col-md-2" style="text-decoration: underline">
                    @lang('For Seller Pricing')
                </div>
                <li class="list-group-item">@lang('Invoice Issue Date') : {{ $invoice->invoice_issued_date }}</li>
                <li class="list-group-item">@lang('Invoice Selling Date') : {{ $invoice->invoice_selling_date }}</li>
                <li class="list-group-item">@lang('Remaining Days') : {{ $invoice->remaining_day }}</li>
                <li class="list-group-item">@lang('Day Delays') : {{ $invoice->day_delays }}</li>
                <li class="list-group-item">@lang('Daily Discount Rate') : {{ $invoice->daily_discount_rate }} %</li>
                <li class="list-group-item">@lang('Discount Rate') : {{ $invoice->seller_discount_rate }} %</li>
                <li class="list-group-item">@lang('Discounted Amount') : {{ $invoice->discounted_amount }}</li>
                <li class="list-group-item">@lang('Service Fees') : {{ $invoice->service_fees }} %</li>
                <li class="list-group-item">@lang('Seller Receivable Amount') : {{ $invoice->seller_receivable_amount }}</li>
            </li>

            
        </ul>

        <div class="row" style="padding: 20px">

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    @if(count($invoice->photos))
                        <div class="h5 text-success" style="text-decoration: underline">
                            @lang('Original Invoice')
                        </div>
                        @foreach ($invoice->photos as $photo)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($photo->photo) }}" class="img"
                            alt="{{ \Illuminate\Support\Facades\Storage::url($photo->photo) }}" height="250" width="250" onclick="this.requestFullscreen()">
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-lg-12 margin-tb" style="padding: 20px">
                <div class="pull-left">
                    @if(count($invoice->purchase_order_image))
                        <div class="h5 text-success" style="text-decoration: underline">
                            @lang('Purchase Order')
                        </div>
                        @foreach ($invoice->purchase_order_image as $purchase_order_image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($purchase_order_image->purchase_order) }}" class="img"
                            alt="{{ \Illuminate\Support\Facades\Storage::url($purchase_order_image->purchase_order) }}" height="250" width="250" onclick="this.requestFullscreen()">
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-lg-12 margin-tb" style="padding: 20px">
                <div class="pull-left">
                    @if(count($invoice->contract_image))
                        <div class="h5 text-success" style="text-decoration: underline">
                            @lang('Contract')
                        </div>
                        @foreach ($invoice->contract_image as $contract_image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($contract_image->contract) }}" class="img"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($contract_image->contract) }}" height="250" width="250" onclick="this.requestFullscreen()">
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-lg-12 margin-tb" style="padding: 20px">
                <div class="pull-left">
                    @if(count($invoice->other_image))
                        <div class="h5 text-success" style="text-decoration: underline">
                            @lang('Other')
                        </div>
                        @foreach ($invoice->other_image as $other_image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($other_image->other) }}" class="img"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($other_image->other) }}" height="250" width="250" onclick="this.requestFullscreen()">
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-lg-12 margin-tb" style="padding: 20px">
                <div class="pull-left">
                    @if(count($invoice->invoice_excel_image))
                        <div class="h5 text-success" style="text-decoration: underline">
                            @lang('Invoice Excel')
                        </div>
                        @foreach ($invoice->invoice_excel_image as $invoice_excel_image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($invoice_excel_image->invoice_excel) }}" class="img"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($invoice_excel_image->invoice_excel) }}" height="250" width="250" onclick="this.requestFullscreen()">
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    @if(count($invoice->payment_record_image))
                        <div class="h5 text-success" style="text-decoration: underline">
                            @lang('Payment Record')
                        </div>
                        @foreach ($invoice->payment_record_image as $payment_record_image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($payment_record_image->payment_record) }}" class="img"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($payment_record_image->payment_record) }}" height="250" width="250" onclick="this.requestFullscreen()">
                        @endforeach
                    @endif
                </div>
            </div>
        
        </div>
        
    </x-slot>

</x-backend.card>

@endsection

<script>
    $(document).ready(function(){$("img").click(function(){this.requestFullscreen()})});
</script>