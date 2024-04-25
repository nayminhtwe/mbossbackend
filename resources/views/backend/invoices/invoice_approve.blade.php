@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')
@section('title', __('Add Invoice Amount'))
@section('content')
<x-forms.post :action="route('admin.invoice_approve')" method="POST" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
                @lang('Add Invoice Amount for invoiceID') <mark><strong>{{$invoice->title}}</strong></mark>
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.invoice.index')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}" id="app">

                <example-component :invoice="{{$invoice}}">
                    {{ csrf_field() }}
                </example-component>

            </div>
        </x-slot>

        {{-- <x-slot name="footer">
            <button class="btn btn-primary float-right" type="submit">@lang('Approve Invoice')</button>
        </x-slot> --}}
    </x-backend.card>
</x-forms.post>
@endsection