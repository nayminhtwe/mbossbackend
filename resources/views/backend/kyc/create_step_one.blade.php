@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')
@section('title', __('Seller Register'))
@section('content')
    <x-forms.post :action="route('admin.kyc.create_step_one_post', $kyc)" method="POST">
        <x-backend.card>
            <x-slot name="header">
                @lang('Seller Register for ') <mark><strong>{{ $app_user->firstName }} {{ $app_user->lastName }}</strong></mark>
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.kyc.app_user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{ userType: '{{ $model::TYPE_ADMIN }}' }">

                    <div class="card --gray-background" style="color: white !important">
                        <strong>
                            <div class="card-header text-center h2">
                                Step 1: Personal Information
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

                            <div class="row">

                                <div class="col-12">
                                    <h4>I: Basic Information</h4>
                                    <input type="hidden" id="app_user_id" name="app_user_id" value="{{ $app_user->id }}" />
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Full Name * :</label>
                                        <input type="text" name="full_name" class="form-control"
                                            value="{{ $app_user->firstName }}" maxlength="100" readonly required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="father_name">Father's Name * :</label>
                                        <input type="text" name="father_name" class="form-control"
                                            value="{{ $buyer_kyc->fatherName }}" maxlength="100" readonly required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nrc_or_passport">NRC ID / Passport Number * :</label>
                                        <input type="text" name="nrc_or_passport" class="form-control"
                                            value="{{ $buyer_kyc->nrc_or_passport }}" maxlength="100" readonly required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marital_status">Marital Status * :</label>
                                        <input type="text" name="marital_status" class="form-control"
                                            value="{{ $buyer_kyc->maritalStatus }}" maxlength="100" readonly required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birth_date">Birth Date * :</label>
                                        <input type="text" name="birth_date" class="form-control"
                                            value="{{ $buyer_kyc->dateOfBirth }}" maxlength="100" readonly required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birth_place_country">Birth Place (Country) * :</label>
                                        <input type="text" name="birth_place_country" class="form-control"
                                            value="{{ old('birth_place_country') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birth_place_city">Birth Place (City) * :</label>
                                        <input type="text" name="birth_place_city" class="form-control"
                                            value="{{ old('birth_place_city') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position">Position * :</label>
                                        <input type="text" name="position" class="form-control"
                                            value="{{ old('position') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nationality">Nationality * :</label>
                                        <input type="text" name="nationality" class="form-control"
                                            value="{{ $buyer_kyc->nationality }}" maxlength="100" readonly required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>II: Contact Information</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="personal_landline">Landline 1:</label>
                                        <input type="text" name="personal_landline" class="form-control"
                                            value="{{ old('personal_landline') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="personal_mobile">Mobile 1 * :</label>
                                        <input type="text" name="personal_mobile" class="form-control"
                                            value="{{ old('personal_mobile') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>III: Authorized Person's Information</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="authorized_person_full_name">Full Name:</label>
                                        <input type="text" name="authorized_person_full_name" class="form-control"
                                            value="{{ $buyer_kyc->authorizePersonName }}" maxlength="100" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="authorized_person_father_name">Father's Name:</label>
                                        <input type="text" name="authorized_person_father_name" class="form-control"
                                            value="{{ old('authorized_person_father_name') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="authorized_person_mobile">Mobile Number:</label>
                                        <input type="text" name="authorized_person_mobile" class="form-control"
                                            value="{{ old('authorized_person_mobile') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="authorized_person_email">Email Address:</label>
                                        <input type="email" name="authorized_person_email" class="form-control"
                                            value="{{ old('authorized_person_email') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>IV: Personal Address 1</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="personal_address_line_one">Address Line 1 * :</label>
                                        <input type="longtext" name="personal_address_line_one" class="form-control"
                                            value="{{ $buyer_kyc->permanentAddress }}" maxlength="100" readonly
                                            required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="personal_address_line_two">Address Line 2:</label>
                                        <input type="longtext" name="personal_address_line_two" class="form-control"
                                            value="{{ old('personal_address_line_two') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country * :</label>
                                        <input type="text" name="country" class="form-control"
                                            value="{{ old('country') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="township">Township * :</label>
                                        <input type="text" name="township" class="form-control"
                                            value="{{ old('township') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state_or_division">State/Division * :</label>
                                        <input type="text" name="state_or_division" class="form-control"
                                            value="{{ old('state_or_division') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zip_code">Zip Code:</label>
                                        <input type="text" name="zip_code" class="form-control"
                                            value="{{ old('zip_code') }}" maxlength="100" />
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-primary float-right" type="submit">@lang('Next')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
