@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update Buyer'))

@section('content')
<x-forms.patch :action="route('admin.buyer-kyc.update', $buyerKyc)" method="POST" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="header">
            @lang('Update Buyer')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.buyer-kyc.index')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <div class="card">

                    <div class="col-12 text-warning"><strong>* refers to required information</strong></div>

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
                            <h4>1: Personal Details</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name(as in NRC) * :</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $buyerKyc->name }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dateOfBirth">date Of Birth * :</label>
                                <input type="text" name="dateOfBirth" class="form-control" value="{{ old('dateOfBirth') ?? $buyerKyc->dateOfBirth }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fatherName">Father's Name * :</label>
                                <input type="text" name="fatherName" class="form-control" value="{{ old('fatherName') ?? $buyerKyc->fatherName }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nationality">Nationality * :</label>
                                <input type="text" name="nationality" class="form-control" value="{{ old('nationality') ?? $buyerKyc->nationality }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nrc_or_passport">NRC / Passport No. * :</label>
                                <input type="text" name="nrc_or_passport" class="form-control" value="{{ old('nrc_or_passport') ?? $buyerKyc->nrc_or_passport }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qualifications">Qualifications * :</label>
                                <input type="text" name="qualifications" class="form-control" value="{{ old('qualifications') ?? $buyerKyc->qualifications }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="occupation">Occupation * :</label>
                                <input type="text" name="occupation" class="form-control" value="{{ old('occupation') ?? $buyerKyc->occupation }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="maritalStatus">Marital Status * :</label>
                                <input type="text" name="maritalStatus" class="form-control" value="{{ old('maritalStatus') ?? $buyerKyc->maritalStatus }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameOfSpouse">Name of Spouse(as in NRC) :</label>
                                <input type="text" name="nameOfSpouse" class="form-control" value="{{ old('nameOfSpouse') ?? $buyerKyc->nameOfSpouse }}" maxlength="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="spouse_nrc_or_passport">Spouse NRC / Passport No. :</label>
                                <input type="text" name="spouse_nrc_or_passport" class="form-control" value="{{ old('spouse_nrc_or_passport') ?? $buyerKyc->spouse_nrc_or_passport }}" maxlength="100" />
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <h4>2: Address Details</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="permanentAddress">Permanent Address *:</label>
                                <input type="text" name="permanentAddress" class="form-control" value="{{ old('permanentAddress') ?? $buyerKyc->permanentAddress }}" maxlength="100" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="currentAddress">Current Address *:</label>
                                <input type="text" name="currentAddress" class="form-control" value="{{ old('currentAddress') ?? $buyerKyc->currentAddress }}" maxlength="100" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postalAddress">Postal Address *:</label>
                                <input type="text" name="postalAddress" class="form-control" value="{{ old('postalAddress') ?? $buyerKyc->postalAddress }}" maxlength="100" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Contact No *:</label>
                                <input type="number" name="phone" class="form-control" value="{{ old('phone') ?? $buyerKyc->phone }}" maxlength="100" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email *:</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') ?? $buyerKyc->email }}" maxlength="100" required/>
                            </div>
                        </div>

                        <div class="col-12">
                            <h4>3: (if employed) Employment Details</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employmentNatureOfBusiness">Nature of Business:</label>
                                <input type="text" name="employmentNatureOfBusiness" class="form-control" value="{{ old('employmentNatureOfBusiness') ?? $buyerKyc->employmentNatureOfBusiness }}" maxlength="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employmentPosition">Position:</label>
                                <input type="text" name="employmentPosition" class="form-control" value="{{ old('employmentPosition') ?? $buyerKyc->employmentPosition }}" maxlength="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employmentYearsOfService">Years of Service:</label>
                                <input type="text" name="employmentYearsOfService" class="form-control" value="{{ old('employmentYearsOfService') ?? $buyerKyc->employmentYearsOfService }}" maxlength="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employerName">Employer Name:</label>
                                <input type="text" name="employerName" class="form-control" value="{{ old('employerName') ?? $buyerKyc->employerName }}" maxlength="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employerAddress">Employer Address:</label>
                                <input type="text" name="employerAddress" class="form-control" value="{{ old('employerAddress') ?? $buyerKyc->employerAddress }}" maxlength="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="officeContactNo">Office Contact No:</label>
                                <input type="text" name="officeContactNo" class="form-control" value="{{ old('officeContactNo') ?? $buyerKyc->officeContactNo }}" maxlength="100" />
                            </div>
                        </div>

                        <div class="col-12">
                            <h4>4: if self-employed</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selfEmploymentNatureOfBusiness">Nature of Business:</label>
                                <input type="text" name="selfEmploymentNatureOfBusiness" class="form-control" value="{{ old('selfEmploymentNatureOfBusiness') ?? $buyerKyc->selfEmploymentNatureOfBusiness }}" maxlength="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="revenueModel">Revenue Model:</label>
                                <input type="text" name="revenueModel" class="form-control" value="{{ old('revenueModel') ?? $buyerKyc->revenueModel }}" maxlength="100" />
                            </div>
                        </div>

                        <div class="col-12">
                            <h4>5: Annual Income</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="annualIncome">Annual Income *:</label>
                                <select name="annualIncome" class="form-control" required>
                                    <option value="(Below and equal to MMK 2,000,000)" {{ $buyerKyc->annualIncome == '(Below and equal to MMK 2,000,000)' ? 'selected' : '' }}>(Below and equal to MMK 2,000,000)</option>
                                    <option value="(From MMK 2,000,001 to MMK 5,000,000)" {{ $buyerKyc->annualIncome == '(From MMK 2,000,001 to MMK 5,000,000)' ? 'selected' : '' }}>(From MMK 2,000,001 to MMK 5,000,000)</option>
                                    <option value="(From MMK 5,000,001 to MMK 10,000,000)" {{ $buyerKyc->annualIncome == '(From MMK 5,000,001 to MMK 10,000,000)' ? 'selected' : '' }}>(From MMK 5,000,001 to MMK 10,000,000)</option>
                                    <option value="(From MMK 10,000,001 to MMK 30,000,000)" {{ $buyerKyc->annualIncome == '(From MMK 10,000,001 to MMK 30,000,000)' ? 'selected' : '' }}>(From MMK 10,000,001 to MMK 30,000,000)</option>
                                    <option value="(From MMK 30,000,001 to MMK 50,000,000)" {{ $buyerKyc->annualIncome == '(From MMK 30,000,001 to MMK 50,000,000)' ? 'selected' : '' }}>(From MMK 30,000,001 to MMK 50,000,000)</option>
                                    <option value="(From MMK 30,000,001 to MMK 50,000,000)" {{ $buyerKyc->annualIncome == '(Above MMK 50,000,000)' ? 'selected' : '' }}>(Above MMK 50,000,000)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sourceOfFund">Source of Fund & Net Worth *:</label>
                                <select name="sourceOfFund" class="form-control" required>
                                    <option value="Employment" {{ $buyerKyc->sourceOfFund == 'Employment' ? 'selected' : '' }}>Employment</option>
                                    <option value="Self Employment" {{ $buyerKyc->sourceOfFund == 'Self Employment' ? 'selected' : '' }}>Self Employment</option>
                                    <option value="Inheritance" {{ $buyerKyc->sourceOfFund == 'Inheritance' ? 'selected' : '' }}>Inheritance</option>
                                    <option value="Others" {{ $buyerKyc->sourceOfFund == 'Others' ? 'selected' : '' }}>Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <h4>6: Bank Reference</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bankAcc">Bank A/C no:</label>
                                <input type="text" name="bankAcc" class="form-control" value="{{ old('bankAcc') ?? $buyerKyc->bankAcc }}" maxlength="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bankName">Bank Name:</label>
                                <input type="text" name="bankName" class="form-control" value="{{ old('bankName') ?? $buyerKyc->bankName }}" maxlength="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bankBranch">Bank Branch:</label>
                                <input type="text" name="bankBranch" class="form-control" value="{{ old('bankBranch') ?? $buyerKyc->bankBranch }}" maxlength="100" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="typeOfAccount">Type of Account:</label>
                                <input type="text" name="typeOfAccount" class="form-control" value="{{ old('typeOfAccount') ?? $buyerKyc->typeOfAccount }}" maxlength="100" />
                            </div>
                        </div>

                        <div class="col-12">
                            <h4>7: Contact Person in case of Emergency</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactName">Name *:</label>
                                <input type="text" name="contactName" class="form-control" value="{{ old('contactName') ?? $buyerKyc->contactName }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_nrc_or_passport">NRC / Passport No *:</label>
                                <input type="text" name="contact_nrc_or_passport" class="form-control" value="{{ old('contact_nrc_or_passport') ?? $buyerKyc->contact_nrc_or_passport }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactRelationship">Relationship *:</label>
                                <input type="text" name="contactRelationship" class="form-control" value="{{ old('contactRelationship') ?? $buyerKyc->contactRelationship }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactNationality">Nationality *:</label>
                                <input type="text" name="contactNationality" class="form-control" value="{{ old('contactNationality') ?? $buyerKyc->contactNationality }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactPhone">Phone No *:</label>
                                <input type="text" name="contactPhone" class="form-control" value="{{ old('contactPhone') ?? $buyerKyc->contactPhone }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactEmail">email Address *:</label>
                                <input type="email" name="contactEmail" class="form-control" value="{{ old('contactEmail') ?? $buyerKyc->contactEmail }}" maxlength="100" required />
                            </div>
                        </div>

                        <div class="col-12">
                            <h4>8: Authorized Person in case of Emergency</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="authorizePersonName">Name *:</label>
                                <input type="text" name="authorizePersonName" class="form-control" value="{{ old('authorizePersonName') ?? $buyerKyc->authorizePersonName }}" maxlength="100" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="authorize_person_nrc_or_passport">NRC / Passport No *:</label>
                                <input type="text" name="authorize_person_nrc_or_passport" class="form-control" value="{{ old('authorize_person_nrc_or_passport') ?? $buyerKyc->authorize_person_nrc_or_passport }}" maxlength="100" required />
                            </div>
                        </div>

                        {{-- <div class="col-12">
                            <h4>9: Profile Picture</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="photoFile">Profile Picture :</label>
                                <input type="file" name="photoFile" class="form-control" />
                            </div>
                        </div> --}}

                        <div class="col-12">
                            <h4>9: Attactments</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nrc_soft_copy">Copy of NRC/Passport :</label>
                                <input type="file" name="nrc_soft_copy" class="form-control" />
                            </div>
                            <div class="row" style="padding: 20px">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        @if($buyerKyc->nrc_soft_copy != null)
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($buyerKyc->nrc_soft_copy) }}" class="img-fluid"
                                            alt="{{ \Illuminate\Support\Facades\Storage::url($buyerKyc->nrc_soft_copy) }}" height="250" width="250" onclick="this.requestFullscreen()">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank_book_soft_copy">Copy of Bank Book :</label>
                                <input type="file" name="bank_book_soft_copy" class="form-control" />
                            </div>
                            <div class="row" style="padding: 20px">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        @if($buyerKyc->bank_book_soft_copy != null)
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($buyerKyc->bank_book_soft_copy) }}" class="img-fluid"
                                            alt="{{ \Illuminate\Support\Facades\Storage::url($buyerKyc->bank_book_soft_copy) }}" height="250" width="250" onclick="this.requestFullscreen()">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="household_registration_soft_copy">Copy of Household registration (optional) :</label>
                                <input type="file" name="household_registration_soft_copy" class="form-control" />
                            </div>
                            <div class="row" style="padding: 20px">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        @if($buyerKyc->household_registration_soft_copy != null)
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($buyerKyc->household_registration_soft_copy) }}" class="img-fluid"
                                            alt="{{ \Illuminate\Support\Facades\Storage::url($buyerKyc->household_registration_soft_copy) }}" height="250" width="250" onclick="this.requestFullscreen()">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="authorize_person_nrc_soft_copy">NRC/Passport copy of Authorized persons (if any) :</label>
                                <input type="file" name="authorize_person_nrc_soft_copy" class="form-control" />
                            </div>
                            <div class="row" style="padding: 20px">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        @if($buyerKyc->authorize_person_nrc_soft_copy != null)
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($buyerKyc->authorize_person_nrc_soft_copy) }}" class="img-fluid"
                                            alt="{{ \Illuminate\Support\Facades\Storage::url($buyerKyc->authorize_person_nrc_soft_copy) }}" height="250" width="250" onclick="this.requestFullscreen()">
                                        @endif
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
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Buyer')</button>
        </x-slot>
    </x-backend.card>
</x-forms.patch>
@endsection

<script>
    $(document).ready(function(){$("img").click(function(){this.requestFullscreen()})});
</script>