@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create App User'))

@section('content')
    <x-forms.post :action="route('admin.appuser.store')" method="POST" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create App User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.appuser.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <div x-data="{ userType: '{{ $model::TYPE_ADMIN }}' }">

                    <div class="form-group row">
                        <label for="firstName" class="col-md-2 col-form-label text-white">@lang('Frist Name *')</label>

                        <div class="col-md-10">
                            <input type="text" name="firstName" class="form-control" placeholder="{{ __('First Name') }}" maxlength="100" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="lastName" class="col-md-2 col-form-label text-white">@lang('Last Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="lastName" class="form-control" placeholder="{{ __('Last Name') }}" maxlength="100" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-white">@lang('Email')</label>

                        <div class="col-md-10">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('Email') }}" maxlength="100" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="phone" class="col-md-2 col-form-label text-white">@lang('Phone Number')</label>

                        <div class="col-md-10">
                            <input type="integer" name="phone" class="form-control" placeholder="{{ __('Enter Mobile Phone Number') }}" maxlength="100" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label text-white">@lang('Password')</label>

                        <div class="col-md-10">
                            <input type="password" name="password" class="form-control" placeholder="{{ __('Enter Your Password') }}" maxlength="20" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="nrc" class="col-md-2 col-form-label text-white">@lang('NRC')</label>

                        <div class="col-md-10">
                            <input type="text" name="nrc" class="form-control" placeholder="{{ __('Enter Your NRC Number') }}" maxlength="100" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="dateOfBirth" class="col-md-2 col-form-label text-white">@lang('Date of Birth')</label>

                        <div class="col-md-10">
                            <input type="date" name="dateOfBirth" class="form-control" placeholder="{{ __('Date of Birth') }}" maxlength="100" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="age" class="col-md-2 col-form-label text-white">@lang('Age')</label>

                        <div class="col-md-10">
                            <input type="integer" name="age" class="form-control" placeholder="{{ __('Age') }}" maxlength="100" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="permanentAddress" class="col-md-2 col-form-label text-white">@lang('Permanent Address')</label>

                        <div class="col-md-10">
                            <input type="text" name="permanentAddress" class="form-control" placeholder="{{ __('Permanent Address') }}" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="currentAddress" class="col-md-2 col-form-label text-white">@lang('Current Address')</label>

                        <div class="col-md-10">
                            <input type="text" name="currentAddress" class="form-control" placeholder="{{ __('Current Address') }}" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="bankName" class="col-md-2 col-form-label text-white">@lang('Bank Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="bankName" class="form-control" placeholder="{{ __('Bank Name') }}" maxlength="100" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="bankAcc" class="col-md-2 col-form-label text-white">@lang('Bank Account')</label>

                        <div class="col-md-10">
                            <input type="integer" name="bankAcc" class="form-control" placeholder="{{ __('Bank Account') }}" maxlength="100" required />
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="seller_buyer_status" class="col-md-2 col-form-label text-white">@lang('Choose Seller or Buyer')</label>

                        <div class="col-md-10">
                            <select class="form-control" name="seller_buyer_status" required>
                                <option value="">Please select Seller or Buyer..</option>
                                <option value="1">Seller</option>
                                <option value="0">Buyer</option>
                            </select>
                        </div>
                    </div>
                    <!--form-group-->

                    <div class="form-group row">
                        <label for="photoFile" class="col-md-2 col-form-label text-white">@lang('Profile Image')</label>

                        <div class="col-md-10 text-white">
                            <input type="file" name="photoFile" placeholder="{{ __('Progile Image') }}" />
                        </div>
                    </div>
                    <!--form-group-->
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create App User')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
