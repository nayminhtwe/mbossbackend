@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Edit Seller'))

@section('content')
<x-forms.patch :action="route('admin.personal-info.update', $sellerPersonalInfo->id)" method="POST" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Update Seller')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.personal-info.index')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <div class="card">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <strong>
                        <div class="card-header text-center h2">
                            Step 1: Personal Information
                        </div>
                        <div class="col-12 text-warning">* refers to required information</div>
                    </strong>
  
                    <div class="card-body">

                        <div class="row">

                            <div class="col-12">
                                <h4>I: Basic Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="full_name">Full Name * :</label>
                                    <input type="text" name="full_name" class="form-control" value="{{ old('full_name') ?? $sellerPersonalInfo->full_name }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_name">Father's Name * :</label>
                                    <input type="text" name="father_name" class="form-control" value="{{ old('father_name') ?? $sellerPersonalInfo->father_name }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nrc_or_passport">NRC ID / Passport Number * :</label>
                                    <input type="text" name="nrc_or_passport" class="form-control" value="{{ old('nrc_or_passport') ?? $sellerPersonalInfo->nrc_or_passport }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marital_status">Marital Status * :</label>
                                    <select class="form-control" name="marital_status" required>
                                        <option value="Single" {{ $sellerPersonalInfo->marital_status == 'Single' ? 'selected' : ''}}>Single</option>
                                        <option value="Married" {{ $sellerPersonalInfo->marital_status == 'Married' ? 'selected' : ''}}>Married</option>
                                        <option value="Divorced" {{ $sellerPersonalInfo->marital_status == 'Divorced' ? 'selected' : ''}}>Divorced</option>
                                        <option value="Not to mention" {{ $sellerPersonalInfo->marital_status == 'Not to mention' ? 'selected' : ''}}>Not to mention</option>
                                    </select>
                                    {{-- <input type="text" name="marital_status" class="form-control" value="{{ old('marital_status') ?? $sellerPersonalInfo->marital_status }}" maxlength="100" required /> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_date">Birth Date * :</label>
                                    <input type="text" name="birth_date" class="form-control" value="{{ old('birth_date') ?? $sellerPersonalInfo->birth_date }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_place_country">Birth Place (Country) * :</label>
                                    <input type="text" name="birth_place_country" class="form-control" value="{{ old('birth_place_country') ?? $sellerPersonalInfo->birth_place_country }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_place_city">Birth Place (City) * :</label>
                                    <input type="text" name="birth_place_city" class="form-control" value="{{ old('birth_place_city') ?? $sellerPersonalInfo->birth_place_city }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Position * :</label>
                                    <input type="text" name="position" class="form-control" value="{{ old('position') ?? $sellerPersonalInfo->position }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationality">Nationality * :</label>
                                    <input type="text" name="nationality" class="form-control" value="{{ old('nationality') ?? $sellerPersonalInfo->nationality }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>II: Contact Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="personal_landline">Landline 1:</label>
                                    <input type="number" name="personal_landline" class="form-control" value="{{ old('personal_landline') ?? $sellerPersonalInfo->personal_landline }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="personal_mobile">Mobile 1 * :</label>
                                    <input type="number" name="personal_mobile" class="form-control" value="{{ old('personal_mobile') ?? $sellerPersonalInfo->personal_mobile }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>III: Authorized Person's Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="authorized_person_full_name">Full Name:</label>
                                    <input type="text" name="authorized_person_full_name" class="form-control" value="{{ old('authorized_person_full_name') ?? $sellerPersonalInfo->authorized_person_full_name }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="authorized_person_father_name">Father's Name:</label>
                                    <input type="text" name="authorized_person_father_name" class="form-control" value="{{ old('authorized_person_father_name') ?? $sellerPersonalInfo->authorized_person_father_name }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="authorized_person_mobile">Mobile Number:</label>
                                    <input type="number" name="authorized_person_mobile" class="form-control" value="{{ old('authorized_person_mobile') ?? $sellerPersonalInfo->authorized_person_mobile }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="authorized_person_email">Email Address:</label>
                                    <input type="email" name="authorized_person_email" class="form-control" value="{{ old('authorized_person_email') ?? $sellerPersonalInfo->authorized_person_email }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>IV: Personal Address 1</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="personal_address_line_one">Address Line 1 * :</label>
                                    <input type="longtext" name="personal_address_line_one" class="form-control" value="{{ old('personal_address_line_one') ?? $sellerPersonalInfo->personal_address_line_one }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="personal_address_line_two">Address Line 2:</label>
                                    <input type="longtext" name="personal_address_line_two" class="form-control" value="{{ old('personal_address_line_two') ?? $sellerPersonalInfo->personal_address_line_two }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">Country * :</label>
                                    <input type="text" name="country" class="form-control" value="{{ old('country') ?? $sellerPersonalInfo->country }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="township">Township * :</label>
                                    <input type="text" name="township" class="form-control" value="{{ old('township') ?? $sellerPersonalInfo->township }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state_or_division">State/Division * :</label>
                                    <input type="text" name="state_or_division" class="form-control" value="{{ old('state_or_division') ?? $sellerPersonalInfo->state_or_division }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip_code">Zip Code:</label>
                                    <input type="text" name="zip_code" class="form-control" value="{{ old('zip_code') ?? $sellerPersonalInfo->zip_code }}" maxlength="100" />
                                </div>
                            </div>

                        </div>
 
                    </div>

                    <strong>
                        <div class="card-header text-center h2">
                            Step 2: Business Information
                        </div>
                    </strong>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>I: Business Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_name">1. Business Name * :</label>
                                    <input type="text" name="business_name" class="form-control" value="{{ old('business_name') ?? $sellerPersonalInfo->app_user->business_info->business_name }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_email">2. Business Email * :</label>
                                    <input type="email" name="business_email" class="form-control" value="{{ old('business_email') ?? $sellerPersonalInfo->app_user->business_info->business_email }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="registration_number">3. Registration Number * :</label>
                                    <input type="text" name="registration_number" class="form-control" value="{{ old('registration_number') ?? $sellerPersonalInfo->app_user->business_info->registration_number }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="registration_date">4. Registration Date * :</label>
                                    <input type="text" name="registration_date" class="form-control" value="{{ old('registration_date') ?? $sellerPersonalInfo->app_user->business_info->registration_date }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="entity_type">5. Entity Type * :</label>
                                    <input type="text" name="entity_type" class="form-control" value="{{ old('entity_type') ?? $sellerPersonalInfo->app_user->business_info->entity_type }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industry">6. Industry * :</label>
                                    <input type="text" name="industry" class="form-control" value="{{ old('industry') ?? $sellerPersonalInfo->app_user->business_info->industry }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>II: Additional Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number_of_employees">1. Number of Employees * :</label>
                                    <input type="text" name="number_of_employees" class="form-control" value="{{ old('number_of_employees') ?? $sellerPersonalInfo->app_user->business_info->number_of_employees }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="revenue_model">2. Revenue Model:</label>
                                    <input type="text" name="revenue_model" class="form-control" value="{{ old('revenue_model') ?? $sellerPersonalInfo->app_user->business_info->revenue_model }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clients">3. Clients:</label>
                                    <input type="text" name="clients" class="form-control" value="{{ old('clients') ?? $sellerPersonalInfo->app_user->business_info->clients }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ownership">4. Ownership:</label>
                                    <input type="text" name="ownership" class="form-control" value="{{ old('ownership') ?? $sellerPersonalInfo->app_user->business_info->ownership }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_or_service">5. Product/Service * :</label>
                                    <input type="text" name="product_or_service" class="form-control" value="{{ old('product_or_service') ?? $sellerPersonalInfo->app_user->business_info->product_or_service }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="net_worth_per_annum">6. Net Worth per annum * :</label>
                                    <input type="text" name="net_worth_per_annum" class="form-control" value="{{ old('net_worth_per_annum') ?? $sellerPersonalInfo->app_user->business_info->net_worth_per_annum }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>III: Business Contact Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_landline">1. Landline 1:</label>
                                    <input type="number" name="business_landline" class="form-control" value="{{ old('business_landline') ?? $sellerPersonalInfo->app_user->business_info->business_landline }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_mobile">2. Mobile 1 * :</label>
                                    <input type="number" name="business_mobile" class="form-control" value="{{ old('business_mobile') ?? $sellerPersonalInfo->app_user->business_info->business_mobile }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>IV: Business Address 1</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_address_line_one">1. Address Line 1 * :</label>
                                    <input type="longtext" name="business_address_line_one" class="form-control" value="{{ old('business_address_line_one') ?? $sellerPersonalInfo->app_user->business_info->business_address_line_one }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_address_line_two">2. Address Line 2:</label>
                                    <input type="longtext" name="business_address_line_two" class="form-control" value="{{ old('business_address_line_two') ?? $sellerPersonalInfo->app_user->business_info->business_address_line_two }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_country">3. Country * :</label>
                                    <input type="text" name="business_country" class="form-control" value="{{ old('business_country') ?? $sellerPersonalInfo->app_user->business_info->business_country }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_township">4. Township * :</label>
                                    <input type="text" name="business_township" class="form-control" value="{{ old('business_township') ?? $sellerPersonalInfo->app_user->business_info->business_township }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_state_or_division">5. State/Division * :</label>
                                    <input type="text" name="business_state_or_division" class="form-control" value="{{ old('business_state_or_division') ?? $sellerPersonalInfo->app_user->business_info->business_state_or_division }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_zip_code">6. Zip Code:</label>
                                    <input type="text" name="business_zip_code" class="form-control" value="{{ old('business_zip_code') ?? $sellerPersonalInfo->app_user->business_info->business_zip_code }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="effective_date">7. Effective Date:</label>
                                    <input type="text" name="effective_date" class="form-control" value="{{ old('effective_date') ?? $sellerPersonalInfo->app_user->business_info->effective_date }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col-12">
                                <h4>I: References (To input all BOD information or minimum 75% of BOD List)</h4>
                            </div>
                            <div class="col">
                                <h4>Reference 1</h4>
                                <div class="form-group">
                                    <label for="reference_one_full_name">1. Full Name * :</label>
                                    <input type="text" name="reference_one_full_name" class="form-control" value="{{ old('reference_one_full_name') ?? $sellerPersonalInfo->app_user->business_info->reference_one_full_name }}" maxlength="100" required />
                                </div>
                                <div class="form-group">
                                    <label for="reference_one_father_name">2. Father's Name * :</label>
                                    <input type="text" name="reference_one_father_name" class="form-control" value="{{ old('reference_one_father_name') ?? $sellerPersonalInfo->app_user->business_info->reference_one_father_name }}" maxlength="100" required />
                                </div>
                                <div class="form-group">
                                    <label for="reference_one_nrc">3. NRC Number * :</label>
                                    <input type="text" name="reference_one_nrc" class="form-control" value="{{ old('reference_one_nrc') ?? $sellerPersonalInfo->app_user->business_info->reference_one_nrc }}" maxlength="100" required />
                                </div>
                                <div class="form-group">
                                    <label for="reference_one_address">4. Address * :</label>
                                    <input type="text" name="reference_one_address" class="form-control" value="{{ old('reference_one_address') ?? $sellerPersonalInfo->app_user->business_info->reference_one_address }}" maxlength="100" required />
                                </div>
                                <div class="form-group">
                                    <label for="reference_one_mobile">5. Mobile Number * :</label>
                                    <input type="number" name="reference_one_mobile" class="form-control" value="{{ old('reference_one_mobile') ?? $sellerPersonalInfo->app_user->business_info->reference_one_mobile }}" maxlength="100" required />
                                </div>
                                <div class="form-group">
                                    <label for="reference_one_position">6. Position * :</label>
                                    <input type="text" name="reference_one_position" class="form-control" value="{{ old('reference_one_position') ?? $sellerPersonalInfo->app_user->business_info->reference_one_position }}" maxlength="100" required />
                                </div>
                                <div class="form-group">
                                    <label for="reference_one_email">7. Email * :</label>
                                    <input type="email" name="reference_one_email" class="form-control" value="{{ old('reference_one_email') ?? $sellerPersonalInfo->app_user->business_info->reference_one_email }}" maxlength="100" required />
                                </div>
                            </div>
                            <div class="col">
                                <h4>Reference 2</h4>
                                <div class="form-group">
                                    <label for="reference_two_full_name">1. Full Name * :</label>
                                    <input type="text" name="reference_two_full_name" class="form-control" value="{{ old('reference_two_full_name') ?? $sellerPersonalInfo->app_user->business_info->reference_two_full_name }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_two_father_name">2. Father's Name * :</label>
                                    <input type="text" name="reference_two_father_name" class="form-control" value="{{ old('reference_two_father_name') ?? $sellerPersonalInfo->app_user->business_info->reference_two_father_name }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_two_nrc">3. NRC Number * :</label>
                                    <input type="text" name="reference_two_nrc" class="form-control" value="{{ old('reference_two_nrc') ?? $sellerPersonalInfo->app_user->business_info->reference_two_nrc }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_two_address">4. Address * :</label>
                                    <input type="text" name="reference_two_address" class="form-control" value="{{ old('reference_two_address') ?? $sellerPersonalInfo->app_user->business_info->reference_two_address }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_two_mobile">5. Mobile Number * :</label>
                                    <input type="number" name="reference_two_mobile" class="form-control" value="{{ old('reference_two_mobile') ?? $sellerPersonalInfo->app_user->business_info->reference_two_mobile }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_two_position">6. Position * :</label>
                                    <input type="text" name="reference_two_position" class="form-control" value="{{ old('reference_two_position') ?? $sellerPersonalInfo->app_user->business_info->reference_two_position }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_two_email">7. Email * :</label>
                                    <input type="email" name="reference_two_email" class="form-control" value="{{ old('reference_two_email') ?? $sellerPersonalInfo->app_user->business_info->reference_two_email }}" maxlength="100" />
                                </div>
                            </div>
                            <div class="col">
                                <h4>Reference 3</h4>
                                <div class="form-group">
                                    <label for="reference_three_full_name">1. Full Name * :</label>
                                    <input type="text" name="reference_three_full_name" class="form-control" value="{{ old('reference_three_full_name') ?? $sellerPersonalInfo->app_user->business_info->reference_three_full_name }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_three_father_name">2. Father's Name * :</label>
                                    <input type="text" name="reference_three_father_name" class="form-control" value="{{ old('reference_three_father_name') ?? $sellerPersonalInfo->app_user->business_info->reference_three_father_name }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_three_nrc">3. NRC Number * :</label>
                                    <input type="text" name="reference_three_nrc" class="form-control" value="{{ old('reference_three_nrc') ?? $sellerPersonalInfo->app_user->business_info->reference_three_nrc }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_three_address">4. Address * :</label>
                                    <input type="text" name="reference_three_address" class="form-control" value="{{ old('reference_three_address') ?? $sellerPersonalInfo->app_user->business_info->reference_three_address }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_three_mobile">5. Mobile Number * :</label>
                                    <input type="number" name="reference_three_mobile" class="form-control" value="{{ old('reference_three_mobile') ?? $sellerPersonalInfo->app_user->business_info->reference_three_mobile }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_three_position">6. Position * :</label>
                                    <input type="text" name="reference_three_position" class="form-control" value="{{ old('reference_three_position') ?? $sellerPersonalInfo->app_user->business_info->reference_three_position }}" maxlength="100" />
                                </div>
                                <div class="form-group">
                                    <label for="reference_three_email">7. Email * :</label>
                                    <input type="email" name="reference_three_email" class="form-control" value="{{ old('reference_three_email') ?? $sellerPersonalInfo->app_user->business_info->reference_three_email }}" maxlength="100" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <strong>
                        <div class="card-header text-center h2">
                            Step 3: SME (Seller) KYC Attachments
                        </div>
                    </strong>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>I: Business Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nrc_soft_copys">1. Soft copy of NRC * :</label>
                                    <input type="file" name="nrc_soft_copys[]" class="form-control" multiple/>
                                </div>
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            {{-- @if($sellerPersonalInfo->app_user->seller_nrc_file->nrc_soft_copy != null)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_nrc_file->nrc_soft_copy) }}" class="img-fluid"
                                                alt="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_nrc_file->nrc_soft_copy) }}" height="200" width="200">
                                            @endif --}}

                                            @foreach ($sellerPersonalInfo->app_user->seller_nrc_files as $file)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($file->nrc_soft_copy) }}"
                                                    class="img-fluid"
                                                    alt="{{ \Illuminate\Support\Facades\Storage::url($file->nrc_soft_copy) }}"
                                                    height="200" width="200" onclick="this.requestFullscreen()">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_registration_soft_copys">2. Soft copy of company registration * :</label>
                                    <input type="file" name="company_registration_soft_copys[]" class="form-control" multiple/>
                                </div>
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            {{-- @if($sellerPersonalInfo->app_user->seller_company_registration_file->company_registration_soft_copy != null)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_company_registration_file->company_registration_soft_copy) }}" class="img-fluid"
                                                alt="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_company_registration_file->company_registration_soft_copy) }}" height="200" width="200">
                                            @endif --}}

                                            @foreach ($sellerPersonalInfo->app_user->seller_company_registration_files as $file)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($file->company_registration_soft_copy) }}"
                                                    class="img-fluid"
                                                    alt="{{ \Illuminate\Support\Facades\Storage::url($file->company_registration_soft_copy) }}"
                                                    height="200" width="200" onclick="this.requestFullscreen()">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_extracts_soft_copys">3. Soft copy of company extracts * :</label>
                                    <input type="file" name="company_extracts_soft_copys[]" class="form-control" multiple/>
                                </div>
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            {{-- @if($sellerPersonalInfo->app_user->seller_company_extract_file->company_extracts_soft_copy != null)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_company_extract_file->company_extracts_soft_copy) }}" class="img-fluid"
                                                alt="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_company_extract_file->company_extracts_soft_copy) }}" height="200" width="200">
                                            @endif --}}

                                            @foreach ($sellerPersonalInfo->app_user->seller_company_extract_files as $file)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($file->company_extracts_soft_copy) }}"
                                                    class="img-fluid"
                                                    alt="{{ \Illuminate\Support\Facades\Storage::url($file->company_extracts_soft_copy) }}"
                                                    height="200" width="200" onclick="this.requestFullscreen()">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="billing_statements">4. At least one updated Billing Statement billed to the Company Address 1) Utility Bills (i.e. Electric, Water,etc.) * :</label>
                                    <input type="file" name="billing_statements[]" class="form-control" multiple/>
                                </div>
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            {{-- @if($sellerPersonalInfo->app_user->seller_company_billing_statement_file->billing_statement != null)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_company_billing_statement_file->billing_statement) }}" class="img-fluid"
                                                alt="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_company_billing_statement_file->billing_statement) }}" height="200" width="200">
                                            @endif --}}

                                            @foreach ($sellerPersonalInfo->app_user->seller_company_billing_statement_files as $file)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($file->billing_statement) }}"
                                                    class="img-fluid"
                                                    alt="{{ \Illuminate\Support\Facades\Storage::url($file->billing_statement) }}"
                                                    height="200" width="200" onclick="this.requestFullscreen()">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_licenses">5. Relevant Business License (eg - YCDC) * :</label>
                                    <input type="file" name="business_licenses[]" class="form-control" multiple/>
                                </div>
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            {{-- @if($sellerPersonalInfo->app_user->seller_business_license_file->business_license != null)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_business_license_file->business_license) }}" class="img-fluid"
                                                alt="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_business_license_file->business_license) }}" height="200" width="200">
                                            @endif --}}

                                            @foreach ($sellerPersonalInfo->app_user->seller_business_license_files as $file)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($file->business_license) }}"
                                                    class="img-fluid"
                                                    alt="{{ \Illuminate\Support\Facades\Storage::url($file->business_license) }}"
                                                    height="200" width="200" onclick="this.requestFullscreen()">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bod_resolutions">6. BOD resolution to open platform trading account and appointment of an authorized person to perform all action relating with invoice selling in M * :</label>
                                    <input type="file" name="bod_resolutions[]" class="form-control" multiple/>
                                </div>
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            {{-- @if($sellerPersonalInfo->app_user->seller_bod_resolution_file->bod_resolution != null)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_bod_resolution_file->bod_resolution) }}" class="img-fluid"
                                                alt="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_bod_resolution_file->bod_resolution) }}" height="200" width="200">
                                            @endif --}}

                                            @foreach ($sellerPersonalInfo->app_user->seller_bod_resolution_files as $file)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($file->bod_resolution) }}"
                                                    class="img-fluid"
                                                    alt="{{ \Illuminate\Support\Facades\Storage::url($file->bod_resolution) }}"
                                                    height="200" width="200" onclick="this.requestFullscreen()">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="import_export_licenses">7. For Import/Export business, licenses of import/export are required :</label>
                                    <input type="file" name="import_export_licenses[]" class="form-control" multiple/>
                                </div>
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            {{-- @if($sellerPersonalInfo->app_user->seller_import_export_license_file != null)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_import_export_license_file->import_export_license) }}" class="img-fluid"
                                                alt="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_import_export_license_file->import_export_license) }}" height="250" width="250">
                                            @endif --}}

                                            @foreach ($sellerPersonalInfo->app_user->seller_import_export_license_files as $file)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($file->import_export_license) }}"
                                                    class="img-fluid"
                                                    alt="{{ \Illuminate\Support\Facades\Storage::url($file->import_export_license) }}"
                                                    height="200" width="200" onclick="this.requestFullscreen()">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contracts">8. For Contract * :</label>
                                    <input type="file" name="contracts[]" class="form-control" multiple/>
                                </div>
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            {{-- @if($sellerPersonalInfo->app_user->seller_contract_file != null)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_contract_file->contract) }}" class="img-fluid"
                                                alt="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_contract_file->contract) }}" height="250" width="250">
                                            @endif --}}

                                            @foreach ($sellerPersonalInfo->app_user->seller_contract_files as $file)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($file->contract) }}"
                                                    class="img-fluid"
                                                    alt="{{ \Illuminate\Support\Facades\Storage::url($file->contract) }}"
                                                    height="200" width="200" onclick="this.requestFullscreen()">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="others">9. Others :</label>
                                    <input type="file" name="others[]" class="form-control" multiple/>
                                </div>
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            {{-- @if($sellerPersonalInfo->app_user->seller_other_file != null)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_other_file->other) }}" class="img-fluid"
                                                alt="{{ \Illuminate\Support\Facades\Storage::url($sellerPersonalInfo->app_user->seller_other_file->other) }}" height="250" width="250">
                                            @endif --}}

                                            @foreach ($sellerPersonalInfo->app_user->seller_other_files as $file)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($file->other) }}"
                                                    class="img-fluid"
                                                    alt="{{ \Illuminate\Support\Facades\Storage::url($file->other) }}"
                                                    height="200" width="200" onclick="this.requestFullscreen()">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Seller')</button>
        </x-slot>
    </x-backend.card>
</x-forms.patch>
@endsection