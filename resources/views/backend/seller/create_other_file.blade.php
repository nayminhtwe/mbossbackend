@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')
@section('title', __('Other Soft Copy'))
@section('content')
<x-forms.post :action="route('admin.other.store')" method="POST" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
                @lang('Seller KYC Attachments for ') <mark><strong>{{$app_user->firstName. ' ' . $app_user->lastName}}</strong></mark>
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.personal-info.app_user')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <div class="card">
                    <strong>
                        <div class="card-header text-center h2">
                            KYC Documents
                        </div>
                        <div class="col-12 text-warning">* refers to required information</div>
                    </strong>
  
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="col-12">
                            <input type="hidden" id="app_user_id" name="app_user_id" value="{{$app_user->id}}" />
                        </div>
                        <div class="form-group row">
                            <label for="other_soft_copy" class="col-md-3 col-form-label">@lang('Soft Copy of Other file :')</label>
        
                            <div class="col-md-9">
                                <input type="file" name="other_soft_copy[]" required multiple/>
                            </div>
                        </div>
                        <!--form-group-->
            
                            
                    </div>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-primary float-right" type="submit">@lang('Create')</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection