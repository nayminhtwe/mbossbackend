@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Edit Payer'))

@section('content')
<x-forms.patch :action="route('admin.category.update', $category)" method="POST" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Update Payer')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.category.index')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Category Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Category Name') }}"
                            value="{{ old('name') ?? $category->name }}" maxlength="100" required />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    <label for="images" class="col-md-2 col-form-label">@lang('Update Images')</label>

                    <div class="col-md-10">
                        <input type="file" name="images" placeholder="{{ __('Update Payer Image') }}" />
                    </div>
                </div>
                <!--form-group-->

                <div class="form-group row">
                    @if($category->images()->exists())
                    <label for="name" class="col-md-2 col-form-label">@lang('Current Payer Image')</label>

                    <div class="col-md-10">
                        {{-- @foreach ($category->images as $image) --}}
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($category->images->image) }}" class="img"
                            alt="{{ \Illuminate\Support\Facades\Storage::url($category->images->image) }}" height="150" width="250" onclick="this.requestFullscreen()">
                        {{-- @endforeach --}}
                    </div>
                    @endif
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Payer')</button>
        </x-slot>
    </x-backend.card>
</x-forms.patch>

@endsection

<script>
    $(document).ready(function(){$("img").click(function(){this.requestFullscreen()})});
</script>