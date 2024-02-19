@extends('backend.layouts.app')

@section('title', __('Deleted Invoice List'))



@section('content')
    <x-frontend.card>
        <x-slot name="header">
            @lang('Deleted Invoice List')
        </x-slot>

        <x-slot name="body">
            <livewire:backend.deleted-invoice-table />
        </x-slot>
    </x-frontend.card>
@endsection
