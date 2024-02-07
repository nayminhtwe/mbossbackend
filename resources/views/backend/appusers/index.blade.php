@extends('backend.layouts.app')

@section('title', __('User List'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('User List')
    </x-slot>

    <x-slot name="body">
        <livewire:backend.app-user-table />
    </x-slot>
</x-backend.card>
@endsection