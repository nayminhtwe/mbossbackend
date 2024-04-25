<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppUser;
use App\Models\SellerPersonalInfo;
use App\Models\SellerBusinessInfo;
use App\Models\SellerImportExportLicenseFile;
use App\Models\SellerOtherFile;
use App\Models\SellerPending;
use App\Models\FileUpload;
use App\Models\SellerCompanyExtractFileRes;
use App\Models\SellerBusinessLicenseFileRes;
use App\Models\SellerBodResolutionFileRes;
use App\Models\SellerImExLicenseFileRes;
use App\Models\SellerBuyerRequest;
use App\Http\Requests\Backend\StoreSellerPersonalInfoRequest;
use App\Http\Requests\Backend\UpdateSellerRequest;
use Storage;

class SellerPersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.seller.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($app_user_id)
    {
        $app_user = AppUser::findOrfail($app_user_id);
  
        return view('backend.seller.create_personal_info',compact('app_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellerPersonalInfoRequest $request)
    {
        $app_user_id = $request->input('app_user_id');
        $validated = $request->validated();

        $seller_personal_info = SellerPersonalInfo::create([
            'app_user_id' => $app_user_id,
            'full_name' => $validated['full_name'],
            'father_name' => $validated['father_name'],
            'nrc_or_passport' => $validated['nrc_or_passport'],
            'marital_status' => $validated['marital_status'],
            'birth_date' => $validated['birth_date'],
            'birth_place_country' => $validated['birth_place_country'],
            'birth_place_city' => $validated['birth_place_city'],
            'position' => $validated['position'],
            'nationality' => $validated['nationality'],
            'personal_landline' => $validated['personal_landline'],
            'personal_mobile' => $validated['personal_mobile'],
            'authorized_person_full_name' => $validated['authorized_person_full_name'],
            'authorized_person_father_name' => $validated['authorized_person_father_name'],
            'authorized_person_mobile' => $validated['authorized_person_mobile'],
            'authorized_person_email' => $validated['authorized_person_email'],
            'personal_address_line_one' => $validated['personal_address_line_one'],
            'personal_address_line_two' => $validated['personal_address_line_two'],
            'country' => $validated['country'],
            'township' => $validated['township'],
            'state_or_division' => $validated['state_or_division'],
            'zip_code' => $validated['zip_code'],
        ]);

        $seller_pending = SellerPending::where('app_user_id', $app_user_id)->first();

        if(!$seller_pending) {
            SellerPending::create([
                'app_user_id' => $app_user_id,
                'personal_info' => 1
            ]);
        } else {
            $seller_pending->personal_info = 1;
            $seller_pending->save();
        }

        $status = [
            'personal_info' => 1,
            'business_info' => 1,
            'nrc_file' => 1,
            'compnay_registration_file' => 1,
            'company_extract_file' => 1,
            'company_billing_statement_file' => 1,
            'business_license_file' => 1,
            'bod_resolution_file' => 1,
            'contract_file' => 1,
            // 'import_export_license_file' => 1
        ];

        $pending_update = SellerPending::where('id', $seller_pending->id)->where($status)->first();
        
        if($pending_update != null) {
            $seller_personal_info->app_user->seller_status = 1;
            $seller_personal_info->app_user->save();
        }

        return redirect()->route('admin.personal-info.app_user', $seller_personal_info)->withFlashSuccess(__('Seller Personal Information was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller_personal_info = SellerPersonalInfo::findOrfail($id);
        return view('backend.seller.show', compact('seller_personal_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sellerPersonalInfo = SellerPersonalInfo::findOrfail($id);

        return view('backend.seller.edit', compact('sellerPersonalInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellerRequest $request, $id)
    {
        $validated = $request->validated();

        $sellerPersonalInfo = SellerPersonalInfo::findOrfail($id);

        $sellerPersonalInfo->update([
            'full_name' => $validated['full_name'],
            'father_name' => $validated['father_name'],
            'nrc_or_passport' => $validated['nrc_or_passport'],
            'marital_status' => $validated['marital_status'],
            'birth_date' => $validated['birth_date'],
            'birth_place_country' => $validated['birth_place_country'],
            'birth_place_city' => $validated['birth_place_city'],
            'position' => $validated['position'],
            'nationality' => $validated['nationality'],
            'personal_landline' => $validated['personal_landline'],
            'personal_mobile' => $validated['personal_mobile'],
            'authorized_person_full_name' => $validated['authorized_person_full_name'],
            'authorized_person_father_name' => $validated['authorized_person_father_name'],
            'authorized_person_mobile' => $validated['authorized_person_mobile'],
            'authorized_person_email' => $validated['authorized_person_email'],
            'personal_address_line_one' => $validated['personal_address_line_one'],
            'personal_address_line_two' => $validated['personal_address_line_two'],
            'country' => $validated['country'],
            'township' => $validated['township'],
            'state_or_division' => $validated['state_or_division'],
            'zip_code' => $validated['zip_code'],
        ]);

        $business_info = SellerBusinessInfo::where('app_user_id', $sellerPersonalInfo->app_user->id)->first();

        $sellerPersonalInfo->app_user->business_info->update([
            'business_name' => $validated['business_name'],
            'business_email' => $validated['business_email'],
            'registration_number' => $validated['registration_number'],
            'registration_date' => $validated['registration_date'],
            'entity_type' => $validated['entity_type'],
            'industry' => $validated['industry'],
            'number_of_employees' => $validated['number_of_employees'],
            'revenue_model' => $validated['revenue_model'],
            'clients' => $validated['clients'],
            'ownership' => $validated['ownership'],
            'product_or_service' => $validated['product_or_service'],
            'net_worth_per_annum' => $validated['net_worth_per_annum'],
            'business_landline' => $validated['business_landline'],
            'business_mobile' => $validated['business_mobile'],
            'business_address_line_one' => $validated['business_address_line_one'],
            'business_address_line_two' => $validated['business_address_line_two'],
            'business_country' => $validated['business_country'],
            'business_township' => $validated['business_township'],
            'business_state_or_division' => $validated['business_state_or_division'],
            'business_zip_code' => $validated['business_zip_code'],
            'effective_date' => $validated['effective_date'],
            'reference_one_full_name' => $validated['reference_one_full_name'],
            'reference_one_father_name' => $validated['reference_one_father_name'],
            'reference_one_nrc' => $validated['reference_one_nrc'],
            'reference_one_address' => $validated['reference_one_address'],
            'reference_one_mobile' => $validated['reference_one_mobile'],
            'reference_one_position' => $validated['reference_one_position'],
            'reference_one_email' => $validated['reference_one_email'],
            'reference_two_full_name' => $validated['reference_two_full_name'],
            'reference_two_father_name' => $validated['reference_two_father_name'],
            'reference_two_nrc' => $validated['reference_two_nrc'],
            'reference_two_address' => $validated['reference_two_address'],
            'reference_two_mobile' => $validated['reference_two_mobile'],
            'reference_two_position' => $validated['reference_two_position'],
            'reference_two_email' => $validated['reference_two_email'],
            'reference_three_full_name' => $validated['reference_three_full_name'],
            'reference_three_father_name' => $validated['reference_three_father_name'],
            'reference_three_nrc' => $validated['reference_three_nrc'],
            'reference_three_address' => $validated['reference_three_address'],
            'reference_three_mobile' => $validated['reference_three_mobile'],
            'reference_three_position' => $validated['reference_three_position'],
            'reference_three_email' => $validated['reference_three_email'],
        ]);

        if($request->hasFile('nrc_soft_copy')) {
            Storage::delete($sellerPersonalInfo->app_user->seller_nrc_file->nrc_soft_copy);
            $nrc_soft_copy = $request->nrc_soft_copy->store('public/attachment');
            $sellerPersonalInfo->app_user->seller_nrc_file->nrc_soft_copy = $nrc_soft_copy;
            $sellerPersonalInfo->app_user->seller_nrc_file->save();
        }

        if($request->hasFile('company_registration_soft_copy')) {
            Storage::delete($sellerPersonalInfo->app_user->seller_company_registration_file->company_registration_soft_copy);
            $company_registration_soft_copy = $request->company_registration_soft_copy->store('public/attachment');
            $sellerPersonalInfo->app_user->seller_company_registration_file->company_registration_soft_copy = $company_registration_soft_copy;
            $sellerPersonalInfo->app_user->seller_company_registration_file->save();
        }

        if($request->hasFile('company_extracts_soft_copy')) {
            Storage::delete($sellerPersonalInfo->app_user->seller_company_extract_file->company_extracts_soft_copy);
            $company_extracts_soft_copy = $request->company_extracts_soft_copy->store('public/attachment');
            $sellerPersonalInfo->app_user->seller_company_extract_file->company_extracts_soft_copy = $company_extracts_soft_copy;
            $sellerPersonalInfo->app_user->seller_company_extract_file->save();
        }

        if($request->hasFile('billing_statement')) {
            Storage::delete($sellerPersonalInfo->app_user->seller_company_billing_statement_file->billing_statement);
            $billing_statement = $request->billing_statement->store('public/attachment');
            $sellerPersonalInfo->app_user->seller_company_billing_statement_file->billing_statement = $billing_statement;
            $sellerPersonalInfo->app_user->seller_company_billing_statement_file->save();
        }

        if($request->hasFile('business_license')) {
            Storage::delete($sellerPersonalInfo->app_user->seller_business_license_file->business_license);
            $business_license = $request->business_license->store('public/attachment');
            $sellerPersonalInfo->app_user->seller_business_license_file->business_license = $business_license;
            $sellerPersonalInfo->app_user->seller_business_license_file->save();
        }
        
        if($request->hasFile('bod_resolution')) {
            Storage::delete($sellerPersonalInfo->app_user->seller_bod_resolution_file->bod_resolution);
            $bod_resolution = $request->bod_resolution->store('public/attachment');
            $sellerPersonalInfo->app_user->seller_bod_resolution_file->bod_resolution = $bod_resolution;
            $sellerPersonalInfo->app_user->seller_bod_resolution_file->save();
        }
        
        if($request->hasFile('import_export_license')) {
            if(!!$sellerPersonalInfo->app_user->seller_import_export_license_file) 
            {
                Storage::delete($sellerPersonalInfo->app_user->seller_import_export_license_file->import_export_license);
                $import_export_license = $request->import_export_license->store('public/attachment');
                $sellerPersonalInfo->app_user->seller_import_export_license_file->import_export_license = $import_export_license;
                $sellerPersonalInfo->app_user->seller_import_export_license_file->save();
            } else {
                $import_export_license = $request->import_export_license->store('public/attachment');
                $seller_import_export_license = SellerImportExportLicenseFile::create([
                    'app_user_id' => $sellerPersonalInfo->app_user->id,
                    'import_export_license' => $import_export_license,
                ]);
            }
        }

        if($request->hasFile('contract')) {
            Storage::delete($sellerPersonalInfo->app_user->seller_contract_file->contract);
            $seller_contract = $request->contract->store('public/attachment');
            $sellerPersonalInfo->app_user->seller_contract_file->contract = $seller_contract;
            $sellerPersonalInfo->app_user->seller_contract_file->save();
        }

        if($request->hasFile('other')) {
            if(!!$sellerPersonalInfo->app_user->seller_other_file) 
            {
                Storage::delete($sellerPersonalInfo->app_user->seller_other_file->other);
                $seller_other = $request->other->store('public/attachment');
                $sellerPersonalInfo->app_user->seller_other_file->other = $seller_other;
                $sellerPersonalInfo->app_user->seller_other_file->save();
            } else {
                $seller_other = $request->other->store('public/attachment');
                $seller_contract = SellerOtherFile::create([
                    'app_user_id' => $sellerPersonalInfo->app_user->id,
                    'other' => $seller_other,
                ]);

            }
        }

        return redirect()->route('admin.personal-info.index')->withFlashSuccess(__('Seller KYC was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function app_user_index()
    {
        $app_users = AppUser::where('seller_status', 0)->get();
  
        return view('backend.seller.app_user_index',compact('app_users'));
    }

    public function pending()
    {
        return view('backend.seller.pending');
    }

    public function request()
    {
        return view('backend.seller.request');
    }

    public function request_show($app_user_id)
    {
        $files = FileUpload::where('app_user_id', $app_user_id)->where('kyc_status', 1)->whereHas('seller_buyer_request', function ($query) {
            $query->where('kyc_status', 1)->where('seller_finish_status', 0);
        })->get();

        $seller_company_extract_file_request = SellerCompanyExtractFileRes::where('app_user_id', $app_user_id)->where('kyc_status', 1)->whereHas('seller_buyer_request', function ($query) {
            $query->where('kyc_status', 1)->where('seller_finish_status', 0);
        })->get();

        $seller_business_license_file_request = SellerBusinessLicenseFileRes::where('app_user_id', $app_user_id)->where('kyc_status', 1)->whereHas('seller_buyer_request', function ($query) {
            $query->where('kyc_status', 1)->where('seller_finish_status', 0);
        })->get();

        $seller_bod_resolution_file_request = SellerBodResolutionFileRes::where('app_user_id', $app_user_id)->where('kyc_status', 1)->whereHas('seller_buyer_request', function ($query) {
            $query->where('kyc_status', 1)->where('seller_finish_status', 0);
        })->get();

        $seller_import_export_license_file_request = SellerImExLicenseFileRes::where('app_user_id', $app_user_id)->where('kyc_status', 1)->whereHas('seller_buyer_request', function ($query) {
            $query->where('kyc_status', 1)->where('seller_finish_status', 0);
        })->get();
        
        return view('backend.seller.request_show', compact(
            'files',
            'seller_company_extract_file_request',
            'seller_business_license_file_request',
            'seller_bod_resolution_file_request',
            'seller_import_export_license_file_request'
        ));
    }

    public function approve($app_user_id)
    {
        $seller_buyer_request = SellerBuyerRequest::where('app_user_id', $app_user_id)->where('kyc_status', 1)->where('seller_finish_status', 0)->first();

        if($seller_buyer_request) {

            $SellerPending = SellerPending::where('app_user_id', $seller_buyer_request->app_user_id)->first();
            if($SellerPending->business_info == 0) {
                return redirect()->route('admin.seller.request')->with('flash_warning','Seller Business Information form is not finished!');
            }
            $seller_buyer_request->seller_finish_status = 1;
            $seller_buyer_request->save();

            $app_user = AppUser::where('id', $seller_buyer_request->app_user_id)->first();
            $app_user->seller_status = 1;
            $app_user->save();

            return view('backend.seller.request');
        }
    }

    public function admin_approve($app_user_id)
    {
        $status = [
            'personal_info' => 1,
            'business_info' => 1,
            'nrc_file' => 1,
            'compnay_registration_file' => 1,
            'company_extract_file' => 1,
            'company_billing_statement_file' => 1,
            'business_license_file' => 1,
            'bod_resolution_file' => 1,
            'contract_file' => 1,
        ];

        $app_user = AppUser::find($app_user_id);

        $seller_pending = SellerPending::where('app_user_id', $app_user_id)->first();

        $pending_update = SellerPending::where('id', $seller_pending->id)->where($status)->first();
        
        if($pending_update != null) {
            $app_user->seller_status = 1;
            $app_user->save();
            return redirect()->route('admin.personal-info.index')->withFlashSuccess(__('Seller has been approved successfully.'));
        } else {
            return redirect()->back()->withFlashDanger(__('KYC information does not complete'));
        }
    }
}
