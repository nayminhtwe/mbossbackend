@extends('backend.layouts.app')

@section('title', __('User Wallet List'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('User Wallet List')
    </x-slot>

    <x-slot name="body">
        <livewire:backend.wallet-table />
    </x-slot>
</x-backend.card>
@endsection