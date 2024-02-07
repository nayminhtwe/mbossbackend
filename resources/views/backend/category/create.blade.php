@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create Payer'))

@section('content')
<x-forms.post :action="route('admin.category.store')" method="POST" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Create Payer')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.category.index')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Payer Name') }}"
                            value="{{ old('name') }}" maxlength="100" required />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="images" class="col-md-2 col-form-label">@lang('Images')</label>

                    <div class="col-md-10">
                        <input type="file" name="images" placeholder="{{ __('Payer Image') }}" required />
                    </div>
                </div>
                <!--form-group-->

            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Payer')</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection