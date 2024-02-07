@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')
@section('title', __('Seller Register'))
@section('content')
<x-forms.post :action="route('admin.kyc.create_step_three_post' , $kyc)" method="POST" enctype="multipart/form-data">
    <x-backend.card>
        <x-slot name="body">
            <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">

                <div class="card">
                    <strong>
                        <div class="card-header text-center h2">
                            Step 3: SME (Seller) KYC Attachments
                        </div>
                        <div class="col-12 text-warning">* refers to required attachments</div>
                    </strong>
  
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>I: Business Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nrc_soft_copy">1. Soft copy of NRC * :</label>
                                    <input type="file" name="nrc_soft_copy" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_registration_soft_copy">2. Soft copy of company registration * :</label>
                                    <input type="file" name="company_registration_soft_copy" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_extracts_soft_copy">3. Soft copy of company extracts * :</label>
                                    <input type="file" name="company_extracts_soft_copy" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="billing_statement">4. At least one updated Billing Statement billed to the Company Address 1) Utility Bills (i.e. Electric, Water, etc.) * :</label>
                                    <input type="file" name="billing_statement" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_license">5. Relevant Business License (eg - YCDC) * :</label>
                                    <input type="file" name="business_license" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bod_resolution">6. BOD resolution to open platform trading account and appointment of an authorized person to perform all action relating with invoice selling in M * :</label>
                                    <input type="file" name="bod_resolution" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="import_export_license">7. For Import/Export business, licenses of import/export are required :</label>
                                    <input type="file" name="import_export_license" class="form-control" />
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
            <button class="btn btn-primary float-right" type="submit">@lang('Submit')</button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
@endsection