@extends('backend.layouts.app')

@section('title', __('Purchased Invoice List'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Purchased Invoice List')
        </x-slot>

        <x-slot name="body">
        <livewire:backend.purchased-invoice-table />
        </x-slot>
    </x-frontend.card>
@endsection
