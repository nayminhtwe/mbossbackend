@extends('backend.layouts.app')

@section('title', __('Buyer List'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Buyer Approved List')
    </x-slot>

    {{-- <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.buyer-kyc.create')"
            :text="__('Create Buyer')" />
    </x-slot> --}}

    <x-slot name="body">
        <livewire:backend.buyer-kyc-table />
    </x-slot>
</x-backend.card>
@endsection