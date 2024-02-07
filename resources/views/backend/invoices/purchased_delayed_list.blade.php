@extends('backend.layouts.app')

@section('title', __('Purchased Delay List'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Purchased Delay List')
        </x-slot>

        <x-slot name="body">
        <livewire:backend.purchased-delayed-invoice-table />
        </x-slot>
    </x-frontend.card>
@endsection