@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Buyer Information Detail'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Buyer Information Detail')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.buyer-kyc.index')" :text="__('Cancel')" />
    </x-slot>

    <x-slot name="body">

        <ul class="list-group">

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('I. Personal Details')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Full Name</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->app_user->firstName . ' ' . $buyer_kyc->app_user->lastName }}
                    </dd>

                    <dt class="col-sm-3">2. Date of Birth</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->dateOfBirth }}</dd>

                    <dt class="col-sm-3">3. Father's Name</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->fatherName }}</dd>

                    <dt class="col-sm-3">4. Nationality</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->nationality }}</dd>

                    <dt class="col-sm-3">5. NRC / Passport No.</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->nrc_or_passport }}</dd>

                    <dt class="col-sm-3">6. Qualifications</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->qualifications }}</dd>

                    <dt class="col-sm-3">7. Occupation</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->occupation }}</dd>

                    <dt class="col-sm-3">8. Marital Status</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->maritalStatus }}</dd>

                    <dt class="col-sm-3">9. Name of Spouse</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->nameOfSpouse }}</dd>

                    <dt class="col-sm-3">10. Spouse NRC / Passport No.</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->spouse_nrc_or_passport }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('II. Address Details')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Permanent Address</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->permanentAddress }}</dd>

                    <dt class="col-sm-3">2. Current Address</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->currentAddress }}</dd>

                    <dt class="col-sm-3">3. Postal Address</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->postalAddress }}</dd>

                    <dt class="col-sm-3">4. Contact No.</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->phone }}</dd>

                    <dt class="col-sm-3">5. Email</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->email }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('III. (if employed) employment Details')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Nature of Business</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->employmentNatureOfBusiness }}</dd>

                    <dt class="col-sm-3">2. Position</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->employmentPosition }}</dd>

                    <dt class="col-sm-3">3. Years of Service</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->employmentYearsOfService }}</dd>

                    <dt class="col-sm-3">4. Employer Name</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->employerName }}</dd>

                    <dt class="col-sm-3">5. Employer Address</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->employerAddress }}</dd>

                    <dt class="col-sm-3">6. Office Contact No.</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->officeContactNo }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('IV. if self - employed')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Nature of Business</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->selfEmploymentNatureOfBusiness }}</dd>

                    <dt class="col-sm-3">2. Revenue model</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->revenueModel }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('V. Annual Income')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Annual Income</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->annualIncome }}</dd>

                    <dt class="col-sm-3">2. Source of Fund & Net Worth</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->sourceOfFund }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('VI. Bank Reference')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Bank Name.</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->bankName }}</dd>

                    <dt class="col-sm-3">2. Bank Branch</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->bankBranch }}</dd>

                    <dt class="col-sm-3">3. Type of Account</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->typeOfAccount }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('VII. Contact Person in case of Emergency')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Name</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->contactName }}</dd>

                    <dt class="col-sm-3">2. NRC / Passport No.</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->contact_nrc_or_passport }}</dd>

                    <dt class="col-sm-3">3. Relationship</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->contactRelationship }}</dd>

                    <dt class="col-sm-3">4. Nationality</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->contactNationality }}</dd>

                    <dt class="col-sm-3">5. Phone No.</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->contactPhone }}</dd>

                    <dt class="col-sm-3">6. Email Address</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->contactEmail }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('VIII. Authorize Person (if any)')
                </div>
                <dl class="row">
                    <dt class="col-sm-3">1. Name</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->authorizePersonName }}</dd>

                    <dt class="col-sm-3">3. NRC / Passport No.</dt>
                    <dd class="col-sm-9">: {{ $buyer_kyc->authorize_person_nrc_or_passport }}</dd>
                </dl>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('Copy of NRC/Passport')
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @if($buyer_kyc->nrc_soft_copy != null)
                            @if (Illuminate\Support\Facades\File::extension($buyer_kyc->nrc_soft_copy) === 'pdf' )
                            <embed src="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->nrc_soft_copy) }}"
                                class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->nrc_soft_copy) }}"
                                height="250" width="250" onclick="this.requestFullscreen()">
                            @else
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->nrc_soft_copy) }}"
                                class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->nrc_soft_copy) }}"
                                height="250" width="250" onclick="this.requestFullscreen()">
                            @endif
                            @else
                            @endif
                            -
                        </div>
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('Copy of Bank Book')
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @if($buyer_kyc->bank_book_soft_copy != null)
                            @if (Illuminate\Support\Facades\File::extension($buyer_kyc->bank_book_soft_copy) === 'pdf' )
                            <embed src="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->bank_book_soft_copy) }}"
                                class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->bank_book_soft_copy) }}"
                                height="250" width="250" onclick="this.requestFullscreen()">
                            @else
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->bank_book_soft_copy) }}"
                                class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->bank_book_soft_copy) }}"
                                height="250" width="250" onclick="this.requestFullscreen()">
                            @endif

                            
                            @else
                            @endif
                            -
                        </div>
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('Copy of Household registration')
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @if($buyer_kyc->household_registration_soft_copy != null)
                            @if (Illuminate\Support\Facades\File::extension($buyer_kyc->household_registration_soft_copy) === 'pdf' )
                            <embed src="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->household_registration_soft_copy) }}"
                            class="img-fluid"
                            alt="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->household_registration_soft_copy) }}"
                            height="250" width="250" onclick="this.requestFullscreen()">
                            @else
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->household_registration_soft_copy) }}"
                                class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->household_registration_soft_copy) }}"
                                height="250" width="250" onclick="this.requestFullscreen()">
                            @endif
                            
                            @else
                            @endif
                            -
                        </div>
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class=" h5 text-info">
                    @lang('NRC/Passport copy of Authorized persons')
                </div>
                <div class="row" style="padding: 20px">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            @if($buyer_kyc->authorize_person_nrc_soft_copy != null)
                            @if (Illuminate\Support\Facades\File::extension($buyer_kyc->authorize_person_nrc_soft_copy) === 'pdf' )
                            <embed src="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->authorize_person_nrc_soft_copy) }}"
                            class="img-fluid"
                            alt="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->authorize_person_nrc_soft_copy) }}"
                            height="250" width="250" onclick="this.requestFullscreen()">
                            @else
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->authorize_person_nrc_soft_copy) }}"
                                class="img-fluid"
                                alt="{{ \Illuminate\Support\Facades\Storage::url($buyer_kyc->authorize_person_nrc_soft_copy) }}"
                                height="250" width="250" onclick="this.requestFullscreen()">
                            @endif
                            @else
                            @endif
                            -
                        </div>
                    </div>
                </div>
            </li>

        </ul>


    </x-slot>

</x-backend.card>

@endsection

<script>
    $(document).ready(function(){$("img").click(function(){this.requestFullscreen()})});
</script>