@extends('backend.layouts.app')

@section('title', __('User Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@push('after-styles')
    <style>
        .width-20 {
            width: 1px !important;
        }

        table{
            border-collapse: separate;
            border-spacing: 0 15px;
            color: black !important;
        }

        table thead th {
            background-color: #707070 !important;
            border-top: 0 !important;
            border-bottom: 0 !important;
        }

        table tbody td, .users-table tbody th {
            background-color: #626161 !important;
            border-top: 0 !important;
            border-bottom: 0;
        }

        table td, .users-table th {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        table thead tr th:first-of-type {
            border-left: 1px solid #707070;
            border-radius: 10px 0 0 10px;
        }

        table thead tr th:last-of-type {
            border-right: 1px solid #707070;
            border-radius: 0 10px 10px 0;
        }

        table tbody tr td:first-of-type {
            border-left: 1px solid #626161;
            border-radius: 10px 0 0 10px;
        }

        table tbody tr td:last-child {
            border-right: 1px solid #626161;
            border-radius: 0 10px 10px 0;
        }

        /*.more-button {*/
        /*    background-color: transparent;*/
        /*    border: 1px solid rgba(255, 255, 255, 0.3);*/
        /*    padding: 3px 10px;*/
        /*    border-radius: 5px;*/
        /*}*/

    </style>
@endpush

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('User Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.auth.user.create')"
                    :text="__('Create User')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.users-table />
        </x-slot>
    </x-backend.card>
@endsection
