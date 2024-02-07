@extends('backend.layouts.app')

@section('title', __('Transaction Logs'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Transaction Logs')
    </x-slot>

    <x-slot name="body">
        <livewire:backend.transaction-log-table />
    </x-slot>
</x-backend.card>
@endsection