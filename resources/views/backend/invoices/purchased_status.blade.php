@extends('backend.layouts.app')

@section('title', __('Purchased Invoice Status List'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Purchased Invoice Status List')
        </x-slot>

        <x-slot name="body">
        <livewire:backend.purchased-invoice-status-table />
        </x-slot>
    </x-frontend.card>
@endsection
