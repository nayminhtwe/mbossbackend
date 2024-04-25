@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')
@section('title', __('Seller Register'))
@section('content')
    <x-forms.post :action="route('admin.kyc.create_step_two_post', $kyc)" method="POST">
        <x-backend.card>
            {{-- <x-slot name="header">
                @lang('Seller Register for ') <mark><strong>{{$app_user->firstName}} {{$app_user->lastName}}</strong></mark>
        </x-slot> --}}

            {{-- <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.kyc.app_user.index')" :text="__('Cancel')" />
        </x-slot> --}}

            <x-slot name="body">
                <div x-data="{ userType: '{{ $model::TYPE_ADMIN }}' }">

                    <div class="card --gray-background" style="color: white !important">
                        <strong>
                            <div class="card-header text-center h2">
                                Step 2: Business Information
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
                                    <h4>I: Business Information</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_name">1. Business Name * :</label>
                                        <input type="text" name="business_name" class="form-control"
                                            value="{{ old('business_name') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_email">2. Business Email * :</label>
                                        <input type="email" name="business_email" class="form-control"
                                            value="{{ old('business_email') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="registration_number">3. Registration Number * :</label>
                                        <input type="text" name="registration_number" class="form-control"
                                            value="{{ old('registration_number') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="registration_date">4. Registration Date * :</label>
                                        <input type="text" name="registration_date" class="form-control"
                                            value="{{ old('registration_date') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="entity_type">5. Entity Type * :</label>
                                        <input type="text" name="entity_type" class="form-control"
                                            value="{{ old('entity_type') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="industry">6. Industry * :</label>
                                        <input type="text" name="industry" class="form-control"
                                            value="{{ old('industry') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>II: Additional Information</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="number_of_employees">1. Number of Employees * :</label>
                                        <input type="text" name="number_of_employees" class="form-control"
                                            value="{{ old('number_of_employees') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="revenue_model">2. Revenue Model:</label>
                                        <input type="text" name="revenue_model" class="form-control"
                                            value="{{ old('revenue_model') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="clients">3. Clients:</label>
                                        <input type="text" name="clients" class="form-control"
                                            value="{{ old('clients') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ownership">4. Ownership:</label>
                                        <input type="text" name="ownership" class="form-control"
                                            value="{{ old('ownership') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_or_service">5. Product/Service * :</label>
                                        <input type="text" name="product_or_service" class="form-control"
                                            value="{{ old('product_or_service') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="net_worth_per_annum">6. Net Worth per annum * :</label>
                                        <input type="text" name="net_worth_per_annum" class="form-control"
                                            value="{{ old('net_worth_per_annum') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>III: Business Contact Information</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_landline">1. Landline 1:</label>
                                        <input type="text" name="business_landline" class="form-control"
                                            value="{{ old('business_landline') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_mobile">2. Mobile 1 * :</label>
                                        <input type="text" name="business_mobile" class="form-control"
                                            value="{{ old('business_mobile') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>IV: Business Address 1</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_address_line_one">1. Address Line 1 * :</label>
                                        <input type="longtext" name="business_address_line_one" class="form-control"
                                            value="{{ old('business_address_line_one') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_address_line_two">2. Address Line 2:</label>
                                        <input type="longtext" name="business_address_line_two" class="form-control"
                                            value="{{ old('business_address_line_two') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_country">3. Country * :</label>
                                        <input type="text" name="business_country" class="form-control"
                                            value="{{ old('business_country') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_township">4. Township * :</label>
                                        <input type="text" name="business_township" class="form-control"
                                            value="{{ old('business_township') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_state_or_division">5. State/Division * :</label>
                                        <input type="text" name="business_state_or_division" class="form-control"
                                            value="{{ old('business_state_or_division') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_zip_code">6. Zip Code:</label>
                                        <input type="text" name="business_zip_code" class="form-control"
                                            value="{{ old('business_zip_code') }}" maxlength="100" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="effective_date">7. Effective Date:</label>
                                        <input type="text" name="effective_date" class="form-control"
                                            value="{{ old('effective_date') }}" maxlength="100" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <strong>
                            <div class="card-header h3">I: References (To input all BOD information or minimum 75% of BOD
                                List)</div>
                        </strong>

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4>Reference 1</h4>
                                    <div class="form-group">
                                        <label for="reference_one_full_name">1. Full Name * :</label>
                                        <input type="text" name="reference_one_full_name" class="form-control"
                                            value="{{ old('reference_one_full_name') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_father_name">2. Father's Name * :</label>
                                        <input type="text" name="reference_one_father_name" class="form-control"
                                            value="{{ old('reference_one_father_name') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_nrc">3. NRC Number * :</label>
                                        <input type="text" name="reference_one_nrc" class="form-control"
                                            value="{{ old('reference_one_nrc') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_address">4. Address * :</label>
                                        <input type="text" name="reference_one_address" class="form-control"
                                            value="{{ old('reference_one_address') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_mobile">5. Mobile Number * :</label>
                                        <input type="text" name="reference_one_mobile" class="form-control"
                                            value="{{ old('reference_one_mobile') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_position">6. Position * :</label>
                                        <input type="text" name="reference_one_position" class="form-control"
                                            value="{{ old('reference_one_position') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_one_email">7. Email * :</label>
                                        <input type="text" name="reference_one_email" class="form-control"
                                            value="{{ old('reference_one_email') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <h4>Reference 2</h4>
                                    <div class="form-group">
                                        <label for="reference_two_full_name">1. Full Name * :</label>
                                        <input type="text" name="reference_two_full_name" class="form-control"
                                            value="{{ old('reference_two_full_name') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_father_name">2. Father's Name * :</label>
                                        <input type="text" name="reference_two_father_name" class="form-control"
                                            value="{{ old('reference_two_father_name') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_nrc">3. NRC Number * :</label>
                                        <input type="text" name="reference_two_nrc" class="form-control"
                                            value="{{ old('reference_two_nrc') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_address">4. Address * :</label>
                                        <input type="text" name="reference_two_address" class="form-control"
                                            value="{{ old('reference_two_address') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_mobile">5. Mobile Number * :</label>
                                        <input type="text" name="reference_two_mobile" class="form-control"
                                            value="{{ old('reference_two_mobile') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_position">6. Position * :</label>
                                        <input type="text" name="reference_two_position" class="form-control"
                                            value="{{ old('reference_two_position') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_two_email">7. Email * :</label>
                                        <input type="text" name="reference_two_email" class="form-control"
                                            value="{{ old('reference_two_email') }}" maxlength="100" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <h4>Reference 3</h4>
                                    <div class="form-group">
                                        <label for="reference_three_full_name">1. Full Name * :</label>
                                        <input type="text" name="reference_three_full_name" class="form-control"
                                            value="{{ old('reference_three_full_name') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_father_name">2. Father's Name * :</label>
                                        <input type="text" name="reference_three_father_name" class="form-control"
                                            value="{{ old('reference_three_father_name') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_nrc">3. NRC Number * :</label>
                                        <input type="text" name="reference_three_nrc" class="form-control"
                                            value="{{ old('reference_three_nrc') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_address">4. Address * :</label>
                                        <input type="text" name="reference_three_address" class="form-control"
                                            value="{{ old('reference_three_address') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_mobile">5. Mobile Number * :</label>
                                        <input type="text" name="reference_three_mobile" class="form-control"
                                            value="{{ old('reference_three_mobile') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_position">6. Position * :</label>
                                        <input type="text" name="reference_three_position" class="form-control"
                                            value="{{ old('reference_three_position') }}" maxlength="100" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="reference_three_email">7. Email * :</label>
                                        <input type="text" name="reference_three_email" class="form-control"
                                            value="{{ old('reference_three_email') }}" maxlength="100" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                {{-- <div class="row">
                <div class="col-md-6 text-left">
                    <a href="{{ route('admin.kyc.create_step_one') }}" class="btn btn-danger pull-right">Previous</a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div> --}}
                <button class="btn btn-primary float-right" type="submit">@lang('Next')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
