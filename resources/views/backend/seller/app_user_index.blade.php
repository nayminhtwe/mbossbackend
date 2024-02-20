@extends('backend.layouts.app')

@section('title', __('Seller Register'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Create Seller Registration')
    </x-slot>

    {{-- <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.kyc.create_step_one')"
            :text="__('Create Seller Registration Form')" />
    </x-slot> --}}

    <x-slot name="body">
        <livewire:backend.app-user-seller-register-table />
    </x-slot>
</x-backend.card>
@endsection
