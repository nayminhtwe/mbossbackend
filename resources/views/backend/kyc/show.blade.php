@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Seller KYC Information Detail'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Seller KYC Information Detail')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.kyc.index')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">

            <ul class="list-group --gray-background" style="color: white !important">

                <li class="list-group-item --gray-background" style="color: white !important">
                    <div class=" h5 text-info">
                        @lang('I. Basic Information')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Full Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->full_name }}</dd>

                        {{-- <dt class="col-sm-3">2. App User Name</dt>
                    <dd class="col-sm-9">: {{ $kyc->app_user->firstName .' '. $kyc->app_user->lastName }}</dd> --}}

                        <dt class="col-sm-3">2. Father's Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->father_name }}</dd>

                        <dt class="col-sm-3">3. NRC ID / Passport Number</dt>
                        <dd class="col-sm-9">: {{ $kyc->nrc_or_passport }}</dd>

                        <dt class="col-sm-3">4. Marital Status</dt>
                        <dd class="col-sm-9">: {{ $kyc->marital_status }}</dd>

                        <dt class="col-sm-3">5. Birth Date</dt>
                        <dd class="col-sm-9">: {{ $kyc->birth_date }}</dd>

                        <dt class="col-sm-3">6. Birth Place (Country)</dt>
                        <dd class="col-sm-9">: {{ $kyc->birth_place_country }}</dd>

                        <dt class="col-sm-3">7. Birth Place (City)</dt>
                        <dd class="col-sm-9">: {{ $kyc->birth_place_city }}</dd>

                        <dt class="col-sm-3">8. Position</dt>
                        <dd class="col-sm-9">: {{ $kyc->position }}</dd>

                        <dt class="col-sm-3">9. Nationality</dt>
                        <dd class="col-sm-9">: {{ $kyc->nationality }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">
                    <div class=" h5 text-info">
                        @lang('II. Contact Information')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Landline 1</dt>
                        <dd class="col-sm-9">: {{ $kyc->personal_landline }}</dd>

                        <dt class="col-sm-3">2. Mobile 1</dt>
                        <dd class="col-sm-9">: {{ $kyc->personal_mobile }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">
                    <div class=" h5 text-info">
                        @lang('III. Authorized Person\'s Information')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Full Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->authorized_person_full_name }}</dd>

                        <dt class="col-sm-3">2. Father's Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->authorized_person_father_name }}</dd>

                        <dt class="col-sm-3">3. Mobile Number</dt>
                        <dd class="col-sm-9">: {{ $kyc->authorized_person_mobile }}</dd>

                        <dt class="col-sm-3">4. Email Address</dt>
                        <dd class="col-sm-9">: {{ $kyc->authorized_person_email }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">
                    <div class=" h5 text-info">
                        @lang('IV. Personal Address 1')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Address Line 1</dt>
                        <dd class="col-sm-9">: {{ $kyc->personal_address_line_one }}</dd>

                        <dt class="col-sm-3">2. Address Line 2</dt>
                        <dd class="col-sm-9">: {{ $kyc->personal_address_line_two }}</dd>

                        <dt class="col-sm-3">3. Country</dt>
                        <dd class="col-sm-9">: {{ $kyc->country }}</dd>

                        <dt class="col-sm-3">4. Township</dt>
                        <dd class="col-sm-9">: {{ $kyc->township }}</dd>

                        <dt class="col-sm-3">4. State/Division</dt>
                        <dd class="col-sm-9">: {{ $kyc->state_or_division }}</dd>

                        <dt class="col-sm-3">4. Zip Code</dt>
                        <dd class="col-sm-9">: {{ $kyc->zip_code }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">
                    <div class=" h5 text-success">
                        @lang('I. Business Information')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Business Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->business_name }}</dd>

                        <dt class="col-sm-3">2. Business Email</dt>
                        <dd class="col-sm-9">: {{ $kyc->business_email }}</dd>

                        <dt class="col-sm-3">3. Registration Number</dt>
                        <dd class="col-sm-9">: {{ $kyc->registration_number }}</dd>

                        <dt class="col-sm-3">4. Registration Date</dt>
                        <dd class="col-sm-9">: {{ $kyc->registration_date }}</dd>

                        <dt class="col-sm-3">5. Entity Type</dt>
                        <dd class="col-sm-9">: {{ $kyc->entity_type }}</dd>

                        <dt class="col-sm-3">6. Industry</dt>
                        <dd class="col-sm-9">: {{ $kyc->industry }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">
                    <div class=" h5 text-success">
                        @lang('II. Additional Information')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Number of Employees</dt>
                        <dd class="col-sm-9">: {{ $kyc->number_of_employees }}</dd>

                        <dt class="col-sm-3">2. Revenue Model</dt>
                        <dd class="col-sm-9">: {{ $kyc->revenue_model }}</dd>

                        <dt class="col-sm-3">3. Clients</dt>
                        <dd class="col-sm-9">: {{ $kyc->clients }}</dd>

                        <dt class="col-sm-3">4. Ownership</dt>
                        <dd class="col-sm-9">: {{ $kyc->ownership }}</dd>

                        <dt class="col-sm-3">5. Product/Service</dt>
                        <dd class="col-sm-9">: {{ $kyc->product_or_service }}</dd>

                        <dt class="col-sm-3">6. Net Worth per annum</dt>
                        <dd class="col-sm-9">: {{ $kyc->net_worth_per_annum }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">
                    <div class=" h5 text-success">
                        @lang('III. Business Contact Information')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Landline 1</dt>
                        <dd class="col-sm-9">: {{ $kyc->business_landline }}</dd>

                        <dt class="col-sm-3">2. Mobile 1</dt>
                        <dd class="col-sm-9">: {{ $kyc->business_mobile }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">
                    <div class=" h5 text-success">
                        @lang('IV. Business Address 1')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Address Line 1</dt>
                        <dd class="col-sm-9">: {{ $kyc->business_address_line_one }}</dd>

                        <dt class="col-sm-3">2. Address Line 2</dt>
                        <dd class="col-sm-9">: {{ $kyc->business_address_line_two }}</dd>

                        <dt class="col-sm-3">3. Country</dt>
                        <dd class="col-sm-9">: {{ $kyc->business_country }}</dd>

                        <dt class="col-sm-3">4. Township</dt>
                        <dd class="col-sm-9">: {{ $kyc->business_township }}</dd>

                        <dt class="col-sm-3">5. State/Division</dt>
                        <dd class="col-sm-9">: {{ $kyc->business_state_or_division }}</dd>

                        <dt class="col-sm-3">6. Zip Code</dt>
                        <dd class="col-sm-9">: {{ $kyc->business_zip_code }}</dd>

                        <dt class="col-sm-3">7. Effective Date</dt>
                        <dd class="col-sm-9">: {{ $kyc->effective_date }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">

                    <div class=" h5 text-primary">
                        @lang('I. References (To input all BOD information or minimum 75% of BOD List)')
                    </div>

                    <div class="h5 text-success">
                        @lang('Reference 1')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Full Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_one_full_name }}</dd>

                        <dt class="col-sm-3">2. Father's Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_one_father_name }}</dd>

                        <dt class="col-sm-3">3. NRC Number</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_one_nrc }}</dd>

                        <dt class="col-sm-3">4. Address</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_one_address }}</dd>

                        <dt class="col-sm-3">5. Mobile Number</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_one_mobile }}</dd>

                        <dt class="col-sm-3">6. Position</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_one_position }}</dd>

                        <dt class="col-sm-3">7. Email</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_one_email }}</dd>
                    </dl>

                    <div class="h5 text-success">
                        @lang('Reference 2')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Full Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_two_full_name }}</dd>

                        <dt class="col-sm-3">2. Father's Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_two_father_name }}</dd>

                        <dt class="col-sm-3">3. NRC Number</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_two_nrc }}</dd>

                        <dt class="col-sm-3">4. Address</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_two_address }}</dd>

                        <dt class="col-sm-3">5. Mobile Number</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_two_mobile }}</dd>

                        <dt class="col-sm-3">6. Position</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_two_position }}</dd>

                        <dt class="col-sm-3">7. Email</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_two_email }}</dd>
                    </dl>

                    <div class="h5 text-success">
                        @lang('Reference 3')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Full Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_three_full_name }}</dd>

                        <dt class="col-sm-3">2. Father's Name</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_three_father_name }}</dd>

                        <dt class="col-sm-3">3. NRC Number</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_three_nrc }}</dd>

                        <dt class="col-sm-3">4. Address</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_three_address }}</dd>

                        <dt class="col-sm-3">5. Mobile Number</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_three_mobile }}</dd>

                        <dt class="col-sm-3">6. Position</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_three_position }}</dd>

                        <dt class="col-sm-3">7. Email</dt>
                        <dd class="col-sm-9">: {{ $kyc->reference_three_email }}</dd>
                    </dl>

                </li>

                <li class="list-group-item">

                    <div class=" h5 text-primary">
                        @lang('I. SME (Seller) KYC Attachments')
                    </div>
                    <div class="h5 text-success">
                        @lang('1. Soft copy of NRC')
                    </div>
                    <div class="row" style="padding: 20px">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @if ($kyc->nrc_soft_copy != null)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($kyc->nrc_soft_copy) }}"
                                        class="img"
                                        alt="{{ \Illuminate\Support\Facades\Storage::url($kyc->nrc_soft_copy) }}"
                                        height="250" width="250">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="h5 text-success">
                        @lang('2. Soft copy of company registration')
                    </div>
                    <div class="row" style="padding: 20px">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @if ($kyc->company_registration_soft_copy != null)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($kyc->company_registration_soft_copy) }}"
                                        class="img"
                                        alt="{{ \Illuminate\Support\Facades\Storage::url($kyc->company_registration_soft_copy) }}"
                                        height="250" width="250">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="h5 text-success">
                        @lang('3. Soft copy of company extracts')
                    </div>
                    <div class="row" style="padding: 20px">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @if ($kyc->company_extracts_soft_copy != null)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($kyc->company_extracts_soft_copy) }}"
                                        class="img"
                                        alt="{{ \Illuminate\Support\Facades\Storage::url($kyc->company_extracts_soft_copy) }}"
                                        height="250" width="250">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="h5 text-success">
                        @lang('4. Billing Statement')
                    </div>
                    <div class="row" style="padding: 20px">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @if ($kyc->billing_statement != null)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($kyc->billing_statement) }}"
                                        class="img"
                                        alt="{{ \Illuminate\Support\Facades\Storage::url($kyc->billing_statement) }}"
                                        height="250" width="250">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="h5 text-success">
                        @lang('5. Relevant Business License (eg - YCDC)')
                    </div>
                    <div class="row" style="padding: 20px">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @if ($kyc->business_license != null)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($kyc->business_license) }}"
                                        class="img"
                                        alt="{{ \Illuminate\Support\Facades\Storage::url($kyc->business_license) }}"
                                        height="250" width="250">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="h5 text-success">
                        @lang('6. BOD resolution to open platform trading account and appointment of an authorized person to perform all action relating with invoice selling in M')
                    </div>
                    <div class="row" style="padding: 20px">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @if ($kyc->bod_resolution != null)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($kyc->bod_resolution) }}"
                                        class="img"
                                        alt="{{ \Illuminate\Support\Facades\Storage::url($kyc->bod_resolution) }}"
                                        height="250" width="250">
                                @endif
                            </div>
                        </div>
                    </div>

                    @if ($kyc->import_export_license != null)
                        <div class="h5 text-success">
                            @lang('7. Import/Export business')
                        </div>
                        <div class="row" style="padding: 20px">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($kyc->import_export_license) }}"
                                        class="img"
                                        alt="{{ \Illuminate\Support\Facades\Storage::url($kyc->import_export_license) }}"
                                        height="250" width="250">
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- <div class="h5 text-success">
                        @lang('7. Import/Export business')
                    </div> --}}
                    @endif

                </li>

            </ul>


        </x-slot>

        {{-- <x-slot name="footer">
        <a class="btn btn-primary float-right" :href="route('admin.kyc.index')" type="submit">@lang('Back')</a>
    </x-slot> --}}

    </x-backend.card>

@endsection
