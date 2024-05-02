@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Edit Invoice'))

@section('content')
<x-forms.patch :action="route('admin.invoice.update', $invoice)" method="POST">
    <x-backend.card>
        <x-slot name="header">
            @lang('Update Invoice')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.invoice.finished')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <div class="form-group row">
                    <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                    <div class="col-md-10">
                        <input type="text" name="title" class="form-control" 
                        value="{{ old('title') ?? $invoice->title }}" maxlength="100" required />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label">@lang('Description')</label>

                    <div class="col-md-10">
                        <input type="text" name="description" class="form-control" placeholder="{{ __('Description') }}"
                            value="{{ old('description') ?? $invoice->description }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="categoryID" class="col-md-2 col-form-label">@lang('Payer')</label>

                    <div class="col-md-10">
                        <select class="form-control" name="categoryID" id="categoryID">
                            @foreach( $categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ ($invoice->category->name) == $category->name ? 'selected' : '' }}>
                                    {{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="place" class="col-md-2 col-form-label">@lang('Place')</label>

                    <div class="col-md-10">
                        <input type="text" name="place" class="form-control" placeholder="{{ __('Place') }}"
                            value="{{ old('place') ?? $invoice->place }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="terms" class="col-md-2 col-form-label">@lang('Terms')</label>

                    <div class="col-md-10">
                        <input type="number" name="terms" class="form-control"
                            value="{{ old('terms') ?? $invoice->terms }}" maxlength="100" required/>
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="price" class="col-md-2 col-form-label">@lang('Original Invoice Amount')</label>

                    <div class="col-md-10">
                        <input type="number" name="price" class="form-control"
                            value="{{ old('price') ?? $invoice->price }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="h3 form-group row col-md-2" style="text-decoration: underline">
                    @lang('For Buyer Pricing')
                </div>

                <div class="form-group row">
                    <label for="purchase_amount" class="col-md-2 col-form-label">@lang('Purchase Amount')</label>

                    <div class="col-md-10">
                        <input type="number" name="purchase_amount" class="form-control"
                            value="{{ old('purchase_amount') ?? $invoice->purchase_amount }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="receivable_amount" class="col-md-2 col-form-label">@lang('Receivable Amount')</label>

                    <div class="col-md-10">
                        <input type="number" name="receivable_amount" class="form-control"
                            value="{{ old('receivable_amount') ?? $invoice->receivable_amount }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="discount_rate" class="col-md-2 col-form-label">@lang('Discount Rate')</label>

                    <div class="col-md-10">
                        <input type="number" min="0" max="100" step="0.01" name="discount_rate" class="form-control"
                            value="{{ old('discount_rate') ?? $invoice->discount }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="h3 form-group row col-md-2" style="text-decoration: underline">
                    @lang('For Seller Pricing')
                </div>

                <div class="form-group row">
                    <label for="invoice_issued_date" class="col-md-2 col-form-label">@lang('Invoice Issued Date')</label>

                    <div class="col-md-10">
                        <input type="date" name="invoice_issued_date" class="form-control"
                            value="{{ old('invoice_issued_date') ?? $invoice->invoice_issued_date }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="invoice_selling_date" class="col-md-2 col-form-label">@lang('Invoice Selling Date')</label>

                    <div class="col-md-10">
                        <input type="date" name="invoice_selling_date" class="form-control"
                            value="{{ old('invoice_selling_date') ?? $invoice->invoice_selling_date }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="date" class="col-md-2 col-form-label">@lang('Invoice Due Date')</label>

                    <div class="col-md-10">
                        <input type="date" name="invoice_due_date" class="form-control"
                            value="{{ old('invoice_due_date') ?? $invoice->date }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="remaining_day" class="col-md-2 col-form-label">@lang('Remaining Days')</label>

                    <div class="col-md-10">
                        <input type="number" name="remaining_day" class="form-control"
                            value="{{ old('remaining_day') ?? $invoice->remaining_day }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="day_delays" class="col-md-2 col-form-label">@lang('Day Delays')</label>

                    <div class="col-md-10">
                        <input type="number" name="day_delays" class="form-control"
                            value="{{ old('day_delays') ?? $invoice->day_delays }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="daily_discount_rate" class="col-md-2 col-form-label">@lang('Daily Discount Rate')</label>

                    <div class="col-md-10">
                        <input type="number" min="0" max="100" step="0.01" name="daily_discount_rate" class="form-control"
                            value="{{ old('daily_discount_rate') ?? $invoice->daily_discount_rate }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="seller_discount_rate" class="col-md-2 col-form-label">@lang('Discount Rate')</label>

                    <div class="col-md-10">
                        <input type="number" min="0" max="100" step="0.01" name="seller_discount_rate" class="form-control"
                            value="{{ old('seller_discount_rate') ?? $invoice->seller_discount_rate }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="discounted_amount" class="col-md-2 col-form-label">@lang('Discounted Amount')</label>

                    <div class="col-md-10">
                        <input type="number" name="discounted_amount" class="form-control"
                            value="{{ old('discounted_amount') ?? $invoice->discounted_amount }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="service_fees" class="col-md-2 col-form-label">@lang('Service Fees')</label>

                    <div class="col-md-10">
                        <input type="number" min="0" max="100" step="0.01" name="service_fees" class="form-control"
                            value="{{ old('service_fees') ?? $invoice->service_fees }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="seller_receivable_amount" class="col-md-2 col-form-label">@lang('Receivable Amount')</label>

                    <div class="col-md-10">
                        <input type="number" name="seller_receivable_amount" class="form-control"
                            value="{{ old('seller_receivable_amount') ?? $invoice->seller_receivable_amount }}" maxlength="100" />
                    </div>
                </div>
                <!--form-group-->

            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Invoice')</button>
        </x-slot>
    </x-backend.card>
</x-forms.patch>

@endsection