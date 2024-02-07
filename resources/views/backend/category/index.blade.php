@extends('backend.layouts.app')

@section('title', __('Payer'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Payer')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.category.create')"
            :text="__('Create Payer')" />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.category-table />
    </x-slot>
</x-backend.card>
@endsection