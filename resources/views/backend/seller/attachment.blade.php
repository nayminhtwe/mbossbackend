@extends('backend.layouts.app')

@section('title', __('KYC Attachments'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Create KYC Attachments')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.personal-info.app_user')" :text="__('Cancel')" />
    </x-slot>

    <input type="hidden" id="app_user_id" name="app_user_id" value="{{$app_user->id}}" />

    {{-- <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.kyc.create_step_one')"
            :text="__('Create Seller Registration Form')" />
    </x-slot> --}}

    <x-slot name="body">
        <livewire:backend.app-user-attachment-table :app_user="$app_user" />
    </x-slot>
</x-backend.card>
@endsection