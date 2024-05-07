@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')
@section('title', __('Add Extra Payment Detail'))
@section('content')
<x-forms.post  :action="route('admin.purchased_finish_after_delay')" method="POST" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
                @lang('Add Extra Payment Detail for ') <mark><strong>{{$invoice->title}}</strong></mark>
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.invoice.purchased_delayed_list')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <div class="card">
                    <strong>
                        <div class="card-header text-center h2">
                            Add Extra Payment Detail
                        </div>
                        <div class="col-12 text-warning">* refers to required information</div>
                    </strong>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">

                            <input hidden id="invoice_id" name="invoice_id" value="{{ $invoice->id }}" />

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id">Invoice ID : <mark><strong>{{$invoice->id}}</strong></mark></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Invoice Name : <mark><strong>{{$invoice->title}}</strong></mark></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="price">Original Invoice Amount : <mark><strong>{{$invoice->price}}</strong></mark></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="receivable_amount">Buyer Receivable Amount : <mark><strong>{{$invoice->receivable_amount}}</strong></mark></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="seller_receivable_amount">Seller Receivable Amount : <mark><strong>{{$invoice->seller_receivable_amount}}</strong></mark></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="extra_day_delay">Extra Day Delay :</label>
                                    <input type="text" name="extra_day_delay" class="form-control" placeholder="{{ __('Extra Day Delay') }}" maxlength="100" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="extra_daily_rate">Extra Daily Rate % :</label>
                                    <input type="text" name="extra_daily_rate" class="form-control" placeholder="{{ __('Extra Daily Rate') }}" maxlength="100" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="extra_service_fee">Extra Service Fees :</label>
                                    <input type="text" name="extra_service_fee" class="form-control" placeholder="{{ __('Extra Service Fee') }}" maxlength="100" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="repayment_amount">Repayment Amount :</label>
                                    <input type="text" name="repayment_amount" class="form-control" placeholder="{{ __('Repayment Amount') }}" maxlength="100" required />
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-primary float-right" type="submit">@lang('Make Finish')</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection