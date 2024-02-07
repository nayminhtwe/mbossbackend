@extends('backend.layouts.app')

@section('title', __('Created Invoice List'))

@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Created Invoice List')
        </x-slot>

        <x-slot name="body">
        <livewire:backend.finished-invoice-table />
        </x-slot>
    </x-frontend.card>
@endsection
