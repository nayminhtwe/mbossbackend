@extends('backend.layouts.app')

@section('title', __('Seller Approved Invoice List'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Seller Approved Invoice List')
        </x-slot>

        <x-slot name="body">
        <livewire:backend.seller-approved-invoice-table />
        </x-slot>
    </x-frontend.card>
@endsection
