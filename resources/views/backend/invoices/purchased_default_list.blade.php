@extends('backend.layouts.app')

@section('title', __('Purchased Default List'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Purchased Default List')
        </x-slot>

        <x-slot name="body">
        <livewire:backend.purchased-default-invoice-table />
        </x-slot>
    </x-frontend.card>
@endsection