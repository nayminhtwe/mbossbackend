@extends('backend.layouts.app')

@section('title', __('Buyer Register'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Create Buyer Registration')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.buyer-kyc.index')" :text="__('Cancel')" />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.app-user-buyer-register-table />
    </x-slot>
</x-backend.card>
@endsection