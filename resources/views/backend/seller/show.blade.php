@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Seller Information Detail'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Seller Information Detail')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.personal-info.index')" :text="__('Cancel')" />
    </x-slot>

    <x-slot name="body">
        
        <ul class="list-group">

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('I. Basic Information')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Full Name</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->full_name }}</dd>

                    {{-- <dt class="col-sm-3">2. App User Name</dt>
                    <dd class="col-sm-9">: {{ $kyc->app_user->firstName .' '. $kyc->app_user->lastName }}</dd> --}}
                    
                    <dt class="col-sm-3">2. Father's Name</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->father_name }}</dd>

                    <dt class="col-sm-3">3. NRC ID / Passport Number</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->nrc_or_passport }}</dd>

                    <dt class="col-sm-3">4. Marital Status</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->marital_status }}</dd>

                    <dt class="col-sm-3">5. Birth Date</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->birth_date }}</dd>

                    <dt class="col-sm-3">6. Birth Place (Country)</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->birth_place_country }}</dd>

                    <dt class="col-sm-3">7. Birth Place (City)</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->birth_place_city }}</dd>

                    <dt class="col-sm-3">8. Position</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->position }}</dd>

                    <dt class="col-sm-3">9. Nationality</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->nationality }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('II. Contact Information')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Landline 1</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->personal_landline }}</dd>

                    <dt class="col-sm-3">2. Mobile 1</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->personal_mobile }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('III. Authorized Person\'s Information')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Full Name</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->authorized_person_full_name }}</dd>

                    <dt class="col-sm-3">2. Father's Name</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->authorized_person_father_name }}</dd>

                    <dt class="col-sm-3">3. Mobile Number</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->authorized_person_mobile }}</dd>

                    <dt class="col-sm-3">4. Email Address</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->authorized_person_email }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('IV. Personal Address 1')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Address Line 1</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->personal_address_line_one }}</dd>

                    <dt class="col-sm-3">2. Address Line 2</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->personal_address_line_two }}</dd>

                    <dt class="col-sm-3">3. Country</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->country }}</dd>

                    <dt class="col-sm-3">4. Township</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->township }}</dd>

                    <dt class="col-sm-3">4. State/Division</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->state_or_division }}</dd>

                    <dt class="col-sm-3">4. Zip Code</dt>
                    <dd class="col-sm-9">: {{ $seller_personal_info->zip_code }}</dd>
                </dl>
            </li>

            @if ($seller_personal_info->app_user->business_info)

                <li class="list-group-item">
                    <div class=" h5 text-success">
                        @lang('I. Business Information')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Business Name</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->business_name }}</dd>

                        <dt class="col-sm-3">2. Business Email</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->business_email }}</dd>

                        <dt class="col-sm-3">3. Registration Number</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->registration_number }}</dd>

                        <dt class="col-sm-3">4. Registration Date</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->registration_date }}</dd>

                        <dt class="col-sm-3">5. Entity Type</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->entity_type }}</dd>

                        <dt class="col-sm-3">6. Industry</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->industry }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">
                    <div class=" h5 text-success">
                        @lang('II. Additional Information')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Number of Employees</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->number_of_employees }}</dd>

                        <dt class="col-sm-3">2. Revenue Model</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->revenue_model }}</dd>

                        <dt class="col-sm-3">3. Clients</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->clients }}</dd>

                        <dt class="col-sm-3">4. Ownership</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->ownership }}</dd>

                        <dt class="col-sm-3">5. Product/Service</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->product_or_service }}</dd>

                        <dt class="col-sm-3">6. Net Worth per annum</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->net_worth_per_annum }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">
                    <div class=" h5 text-success">
                        @lang('III. Business Contact Information')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Landline 1</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->business_landline }}</dd>

                        <dt class="col-sm-3">2. Mobile 1</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->business_mobile }}</dd>
                    </dl>
                </li>

                <li class="list-group-item">
                    <div class=" h5 text-success">
                        @lang('IV. Business Address 1')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Address Line 1</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->business_address_line_one }}</dd>

                        <dt class="col-sm-3">2. Address Line 2</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->business_address_line_two }}</dd>

                        <dt class="col-sm-3">3. Country</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->business_country }}</dd>

                        <dt class="col-sm-3">4. Township</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->business_township }}</dd>

                        <dt class="col-sm-3">5. State/Division</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->business_state_or_division }}</dd>

                        <dt class="col-sm-3">6. Zip Code</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->business_zip_code }}</dd>

                        <dt class="col-sm-3">7. Effective Date</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->effective_date }}</dd>
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
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_one_full_name }}</dd>

                        <dt class="col-sm-3">2. Father's Name</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_one_father_name }}</dd>

                        <dt class="col-sm-3">3. NRC Number</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_one_nrc }}</dd>

                        <dt class="col-sm-3">4. Address</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_one_address }}</dd>

                        <dt class="col-sm-3">5. Mobile Number</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_one_mobile }}</dd>

                        <dt class="col-sm-3">6. Position</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_one_position }}</dd>

                        <dt class="col-sm-3">7. Email</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_one_email }}</dd>
                    </dl>

                    <div class="h5 text-success">
                        @lang('Reference 2')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Full Name</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_two_full_name }}</dd>

                        <dt class="col-sm-3">2. Father's Name</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_two_father_name }}</dd>

                        <dt class="col-sm-3">3. NRC Number</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_two_nrc }}</dd>

                        <dt class="col-sm-3">4. Address</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_two_address }}</dd>

                        <dt class="col-sm-3">5. Mobile Number</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_two_mobile }}</dd>

                        <dt class="col-sm-3">6. Position</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_two_position }}</dd>

                        <dt class="col-sm-3">7. Email</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_two_email }}</dd>
                    </dl>

                    <div class="h5 text-success">
                        @lang('Reference 3')
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3">1. Full Name</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_three_full_name }}</dd>

                        <dt class="col-sm-3">2. Father's Name</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_three_father_name }}</dd>

                        <dt class="col-sm-3">3. NRC Number</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_three_nrc }}</dd>

                        <dt class="col-sm-3">4. Address</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_three_address }}</dd>

                        <dt class="col-sm-3">5. Mobile Number</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_three_mobile }}</dd>

                        <dt class="col-sm-3">6. Position</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_three_position }}</dd>

                        <dt class="col-sm-3">7. Email</dt>
                        <dd class="col-sm-9">: {{ $seller_personal_info->app_user->business_info->reference_three_email }}</dd>
                    </dl>

                </li>

            @endif

            <li class="list-group-item">

                <div class=" h5 text-primary">
                    @lang('I. SME (Seller) KYC Attachments')
                </div>
                @if ($seller_personal_info->app_user->seller_nrc_file)
                <div class="h5 text-success">
                    @lang('1. Soft copy of NRC')
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @if($seller_personal_info->app_user->seller_nrc_file->nrc_soft_copy != null)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_nrc_file->nrc_soft_copy) }}" class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_nrc_file->nrc_soft_copy) }}" height="250" width="250" onclick="this.requestFullscreen()">
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                
                @if ($seller_personal_info->app_user->seller_company_registration_file)
                <div class="h5 text-success">
                    @lang('2. Soft copy of company registration')
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @if($seller_personal_info->app_user->seller_company_registration_file->company_registration_soft_copy != null)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_company_registration_file->company_registration_soft_copy) }}" class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_company_registration_file->company_registration_soft_copy) }}" height="250" width="250" onclick="this.requestFullscreen()">
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                @if ($seller_personal_info->app_user->seller_company_extract_file)
                <div class="h5 text-success">
                    @lang('3. Soft copy of company extracts')
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @if($seller_personal_info->app_user->seller_company_extract_file->company_extracts_soft_copy != null)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_company_extract_file->company_extracts_soft_copy) }}" class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_company_extract_file->company_extracts_soft_copy) }}" height="250" width="250" onclick="this.requestFullscreen()">
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                
                @if ($seller_personal_info->app_user->seller_company_billing_statement_file)
                <div class="h5 text-success">
                    @lang('4. Billing Statement')
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @if($seller_personal_info->app_user->seller_company_billing_statement_file->billing_statement != null)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_company_billing_statement_file->billing_statement) }}" class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_company_billing_statement_file->billing_statement) }}" height="250" width="250" onclick="this.requestFullscreen()">
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                
                @if ($seller_personal_info->app_user->seller_business_license_file)
                <div class="h5 text-success">
                    @lang('5. Relevant Business License (eg - YCDC)')
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @if($seller_personal_info->app_user->seller_business_license_file->business_license != null)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_business_license_file->business_license) }}" class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_business_license_file->business_license) }}" height="250" width="250" onclick="this.requestFullscreen()">
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                
                @if ($seller_personal_info->app_user->seller_bod_resolution_file)
                    <div class="h5 text-success">
                        @lang('6. BOD resolution to open platform trading account and appointment of an authorized person to perform all action relating with invoice selling in M')
                    </div>
                    <div class="row" style="padding: 20px">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @if($seller_personal_info->app_user->seller_bod_resolution_file->bod_resolution != null)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_bod_resolution_file->bod_resolution) }}" class="img-fluid"
                                    alt="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_bod_resolution_file->bod_resolution) }}" height="250" width="250" onclick="this.requestFullscreen()">
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                
                @if($seller_personal_info->app_user->seller_import_export_license_file)
                    <div class="h5 text-success">
                        @lang('7. Import/Export business')
                    </div>
                    <div class="row" style="padding: 20px">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                @if($seller_personal_info->app_user->seller_import_export_license_file->import_export_license != null)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_import_export_license_file->import_export_license) }}" class="img-fluid"
                                    alt="{{ \Illuminate\Support\Facades\Storage::url($seller_personal_info->app_user->seller_import_export_license_file->import_export_license) }}" height="250" width="250" onclick="this.requestFullscreen()">
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    
                @endif

            </li>
            
        </ul>

        
    </x-slot>

    {{-- <x-slot name="footer">
        <a class="btn btn-primary float-right" :href="route('admin.kyc.index')" type="submit">@lang('Back')</a>
    </x-slot> --}}

</x-backend.card>

@endsection

<script>
    $(document).ready(function(){$("img").click(function(){this.requestFullscreen()})});
</script>