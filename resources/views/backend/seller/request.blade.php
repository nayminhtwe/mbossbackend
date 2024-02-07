@extends('backend.layouts.app')

@section('title', __('Seller Request List'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Seller Request List')
    </x-slot>

    @if(session()->get('flash_warning'))
    <x-utils.alert type="warning" class="header-message">
        {{ session()->get('flash_warning') }}
    </x-utils.alert>
@endif

    {{-- <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.kyc.create_step_one')"
            :text="__('Create Seller Registration Form')" />
    </x-slot> --}}

    <x-slot name="body">
        <livewire:backend.seller-request-table />
    </x-slot>
</x-backend.card>
@endsection