@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')
@section('title', __('Add Invoice Amount'))
@section('content')
    <x-forms.post :action="route('admin.invoice_approve')" method="POST" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Add Invoice Amount for invoiceID') <mark><strong>{{ $invoice->title }}</strong></mark>
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.invoice.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{ userType: '{{ $model::TYPE_ADMIN }}' }">

                    <div class="card --gray-background" style="color: white !important">
                        <strong>
                            <div class="card-header text-center h2">
                                Add Invoice Amount
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

                            <div class="col-12">
                                <input type="hidden" id="id" name="id" value="{{ $invoice->id }}" />
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-3 col-form-label">@lang('Original Invoice Amount* :')</label>

                                <div class="col-md-8">
                                    <input type="number" name="price" class="form-control"
                                        placeholder="{{ __('Original Invoice Amount') }}" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="h4 form-group row col-md-2" style="text-decoration: underline">
                                @lang('For Buyer Pricing')
                            </div>

                            <div class="form-group row">
                                <label for="purchase_amount" class="col-md-3 col-form-label">@lang('Purchase Amount*')</label>

                                <div class="col-md-8">
                                    <input type="number" name="purchase_amount" class="form-control"
                                        placeholder="{{ __('Purchase Amount') }}" required />
                                </div>
                            </div>
                            <!--form-group-->
                            <div class="form-group row">
                                <label for="receivable_amount" class="col-md-3 col-form-label">@lang('Receivable Amount*')</label>

                                <div class="col-md-8">
                                    <input type="number" name="receivable_amount" class="form-control"
                                        placeholder="{{ __('Receivable Amount') }}" required />
                                </div>
                            </div>
                            <!--form-group-->
                            <div class="form-group row">
                                <label for="discount_rate" class="col-md-3 col-form-label">@lang('Discount Rate (%)*')</label>

                                <div class="col-md-8">
                                    <input type="number" min="0" max="100" step="0.01" name="discount_rate"
                                        class="form-control" placeholder="{{ __('Discount Rate') }}" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="h4 form-group row col-md-2" style="text-decoration: underline">
                                @lang('For Seller Pricing')
                            </div>

                            <div class="form-group row">
                                <label for="invoice_issued_date" class="col-md-3 col-form-label">@lang('Invoice Issued Date*')</label>

                                <div class="col-md-8">
                                    <input type="date" name="invoice_issued_date" class="form-control"
                                        placeholder="{{ __('Invoice Issued Date') }}"
                                        value="{{ old('invoice_issued_date') ?? $invoice->invoice_issued_date }}"
                                        maxlength="100" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row">
                                <label for="invoice_selling_date" class="col-md-3 col-form-label">@lang('Invoice Selling Date*')</label>

                                <div class="col-md-8">
                                    <input type="date" name="invoice_selling_date" class="form-control"
                                        placeholder="{{ __('Invoice Selling Date') }}"
                                        value="{{ old('invoice_selling_date') ?? $invoice->invoice_selling_date }}"
                                        maxlength="100" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row">
                                <label for="remaining_day" class="col-md-3 col-form-label">@lang('Remaining Days *')</label>

                                <div class="col-md-8">
                                    <input type="number" name="remaining_day" class="form-control"
                                        placeholder="{{ __('Remaining Days') }}"
                                        value="{{ old('remaining_day') ?? $invoice->remaining_day }}" maxlength="100"
                                        required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row">
                                <label for="day_delays" class="col-md-3 col-form-label">@lang('Day Delays *')</label>

                                <div class="col-md-8">
                                    <input type="number" name="day_delays" class="form-control"
                                        placeholder="{{ __('Day Delays') }}"
                                        value="{{ old('day_delays') ?? $invoice->day_delays }}" maxlength="100" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row">
                                <label for="daily_discount_rate" class="col-md-3 col-form-label">@lang('Daily Discount Rate (%)*')</label>

                                <div class="col-md-8">
                                    <input type="number" min="0" max="100" step="0.01"
                                        name="daily_discount_rate" class="form-control"
                                        placeholder="{{ __('Daily Discount Rate') }}"
                                        value="{{ old('daily_discount_rate') ?? $invoice->daily_discount_rate }}"
                                        maxlength="100" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row">
                                <label for="seller_discount_rate"
                                    class="col-md-3 col-form-label">@lang('Discount Rate (%)*')</label>

                                <div class="col-md-8">
                                    <input type="number" min="0" max="100" step="0.01"
                                        name="seller_discount_rate" class="form-control"
                                        placeholder="{{ __('Discount Rate') }}"
                                        value="{{ old('seller_discount_rate') ?? $invoice->seller_discount_rate }}"
                                        maxlength="100" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row">
                                <label for="discounted_amount" class="col-md-3 col-form-label">@lang('Discounted Amount*')</label>

                                <div class="col-md-8">
                                    <input type="number" name="discounted_amount" class="form-control"
                                        placeholder="{{ __('Discounted Amount') }}"
                                        value="{{ old('discounted_amount') ?? $invoice->discounted_amount }}"
                                        maxlength="100" required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row">
                                <label for="service_fees" class="col-md-3 col-form-label">@lang('Service Fees (%)*')</label>

                                <div class="col-md-8">
                                    <input type="number" min="0" max="100" step="0.01"
                                        name="service_fees" class="form-control" placeholder="{{ __('Service Fees') }}"
                                        value="{{ old('service_fees') ?? $invoice->service_fees }}" maxlength="100"
                                        required />
                                </div>
                            </div>
                            <!--form-group-->

                            <div class="form-group row">
                                <label for="seller_receivable_amount"
                                    class="col-md-3 col-form-label">@lang('Receivable Amount*')</label>

                                <div class="col-md-8">
                                    <input type="number" name="seller_receivable_amount" class="form-control"
                                        placeholder="{{ __('Receivable Amount') }}"
                                        value="{{ old('seller_receivable_amount') ?? $invoice->seller_receivable_amount }}"
                                        maxlength="100" required />
                                </div>
                            </div>
                            <!--form-group-->
                        </div>
                    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-primary float-right" type="submit">@lang('Approve Invoice')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
