@extends('backend.layouts.app')

@section('title', __('Buyer Request List'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Buyer Request List')
    </x-slot>

    {{-- <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.kyc.create_step_one')"
            :text="__('Create Seller Registration Form')" />
    </x-slot> --}}

    <x-slot name="body">
        <livewire:backend.buyer-request-table />
    </x-slot>
</x-backend.card>
@endsection