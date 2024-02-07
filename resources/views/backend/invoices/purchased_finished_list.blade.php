@extends('backend.layouts.app')

@section('title', __('Purchased Finish List'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Purchased Finish List')
        </x-slot>

        <x-slot name="body">
        <livewire:backend.purchased-finished-invoice-table />
        </x-slot>
    </x-frontend.card>
@endsection