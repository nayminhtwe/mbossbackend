@extends('backend.layouts.app')

@section('title', __('Invoice List'))

@section('content')
<x-frontend.card>
    <x-slot name="header">
        @lang('Pending Invoice List')
    </x-slot>

    <x-slot name="body">
        <livewire:backend.pending-invoice-table />
    </x-slot>
</x-frontend.card>
@endsection
