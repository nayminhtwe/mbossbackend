@extends('backend.layouts.app')

@section('title', __('Purchased Finish After Delay List'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Purchased Finish After Delay List')
        </x-slot>

        <x-slot name="body">
        <livewire:backend.purchased-finished-after-delay-invoice-table />
        </x-slot>
    </x-frontend.card>
@endsection