@extends('backend.layouts.app')

@section('title', __('Sale Ended Invoice List'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Sale Ended Invoice List')
        </x-slot>

        <x-slot name="body">
            <livewire:backend.sale-ended-invoice-table />
        </x-slot>
    </x-frontend.card>
@endsection
