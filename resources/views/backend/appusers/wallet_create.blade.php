@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Wallet Topup'))

@section('content')
<x-forms.post :action="route('admin.wallet_store', $app_user)" method="POST" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Wallet Topup for User ID -> ')<mark><strong>{{$app_user->id}}</strong></mark>
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.wallet')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <div class="form-group row">
                    <label for="firstName" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="firstName" class="form-control" placeholder="{{ __('Name') }}"
                        value="{{ old('firstName') ?? $app_user->firstName . ' ' . $app_user->lastName }}" maxlength="100" readonly />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="wallet" class="col-md-2 col-form-label">@lang('Topup Amount')</label>

                    <div class="col-md-10">
                        <input type="text" name="wallet" class="form-control" placeholder="{{ __('Topup Amount') }}"
                            value="{{ old('wallet') }}" maxlength="100" required />
                    </div>
                </div>
                <!--form-group-->

            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Make Topup')</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection