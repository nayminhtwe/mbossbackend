<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kyc;
use App\Models\BuyerKyc;
use App\Models\AppUser;
use App\Http\Requests\Backend\StoreKycStepOneRequest;
use App\Http\Requests\Backend\StoreKycStepTwoRequest;
use App\Http\Requests\Backend\StoreKycStepThreeRequest;
use App\Http\Requests\Backend\UpdateKycRequest;
use Illuminate\Support\Facades\Storage;

class KycController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.kyc.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* Create Step One */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kyc $kyc)
    {
        return view('backend.kyc.show', compact('kyc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kyc $kyc)
    {
        return view('backend.kyc.edit')->withKyc($kyc);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKycRequest $request, Kyc $kyc)
    {
        $validated = $request->validated();

        $kyc->update([
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
            Storage::delete($kyc->nrc_soft_copy);
            $nrc_soft_copy = $request->nrc_soft_copy->store('public/kyc');
            $kyc->nrc_soft_copy = $nrc_soft_copy;
            $kyc->save();
        }

        if($request->hasFile('company_registration_soft_copy')) {
            Storage::delete($kyc->company_registration_soft_copy);
            $company_registration_soft_copy = $request->company_registration_soft_copy->store('public/kyc');
            $kyc->company_registration_soft_copy = $company_registration_soft_copy;
            $kyc->save();
        }

        if($request->hasFile('company_extracts_soft_copy')) {
            Storage::delete($kyc->company_extracts_soft_copy);
            $company_extracts_soft_copy = $request->company_extracts_soft_copy->store('public/kyc');
            $kyc->company_extracts_soft_copy = $company_extracts_soft_copy;
            $kyc->save();
        }

        if($request->hasFile('billing_statement')) {
            Storage::delete($kyc->billing_statement);
            $billing_statement = $request->billing_statement->store('public/kyc');
            $kyc->billing_statement = $billing_statement;
            $kyc->save();
        }

        if($request->hasFile('business_license')) {
            Storage::delete($kyc->business_license);
            $business_license = $request->business_license->store('public/kyc');
            $kyc->business_license = $business_license;
            $kyc->save();
        }
        
        if($request->hasFile('bod_resolution')) {
            Storage::delete($kyc->bod_resolution);
            $bod_resolution = $request->bod_resolution->store('public/kyc');
            $kyc->bod_resolution = $bod_resolution;
            $kyc->save();
        }
        
        if($request->hasFile('import_export_license')) {
            Storage::delete($kyc->import_export_license);
            $import_export_license = $request->import_export_license->store('public/kyc');
            $kyc->import_export_license = $import_export_license;
            $kyc->save();
        }
        
        return redirect()->route('admin.kyc.index', $kyc)->withFlashSuccess(__('Seller KYC was successfully updated.'));
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
  
        return view('backend.kyc.app_user_index',compact('app_users'));
    }

    public function createStepOne(Request $request, $app_user_id)
    {
        $kyc = $request->session()->get('kyc');
        $app_user = AppUser::findOrfail($app_user_id);
        $buyer_kyc = BuyerKyc::where('app_user_id', $app_user_id)->first();
  
        return view('backend.kyc.create_step_one',compact('kyc','app_user','buyer_kyc'));
    }

    public function postCreateStepOne(StoreKycStepOneRequest $request)
    {
        $app_user_id = $request->input('app_user_id');
        $validatedData = $request->validated();

        if(empty($request->session()->get('kyc'))){
            $kyc = new Kyc();
            $kyc->fill($validatedData);
            $request->session()->put('kyc', $kyc);
        }else{
            $kyc = $request->session()->get('kyc');
            $kyc->fill($validatedData);
            $request->session()->put('kyc', $kyc);
        }
  
        return redirect()->route('admin.kyc.create_step_two');
    }

    public function createStepTwo(Request $request)
    {
        $kyc = $request->session()->get('kyc');
  
        return view('backend.kyc.create_step_two',compact('kyc'));
    }

    public function postCreateStepTwo(StoreKycStepTwoRequest $request)
    {
        $validatedData = $request->validated();

        $kyc = $request->session()->get('kyc');
        $kyc->fill($validatedData);
        $request->session()->put('kyc', $kyc);
  
        return redirect()->route('admin.kyc.create_step_three');
    }

    public function createStepThree(Request $request)
    {
        $kyc = $request->session()->get('kyc');
  
        return view('backend.kyc.create_step_three',compact('kyc'));
    }

    public function postCreateStepThree(StoreKycStepThreeRequest $request)
    {
        $validatedData = $request->validated();
        $kyc = $request->session()->get('kyc');

        $nrc_soft_copy = $request->nrc_soft_copy->store('public/kyc');
        $company_registration_soft_copy = $request->company_registration_soft_copy->store('public/kyc');
        $company_extracts_soft_copy = $request->company_extracts_soft_copy->store('public/kyc');
        $billing_statement = $request->billing_statement->store('public/kyc');
        $business_license = $request->business_license->store('public/kyc');
        $bod_resolution = $request->bod_resolution->store('public/kyc');
        if($request->hasFile('import_export_license')) {
            $import_export_license = $request->import_export_license->store('public/kyc');
            $kyc->import_export_license = $import_export_license;
        }
        
        $kyc->nrc_soft_copy = $nrc_soft_copy;
        $kyc->company_registration_soft_copy = $company_registration_soft_copy;
        $kyc->company_extracts_soft_copy = $company_extracts_soft_copy;
        $kyc->billing_statement = $billing_statement;
        $kyc->business_license = $business_license;
        $kyc->bod_resolution = $bod_resolution;
        $request->session()->put('kyc', $kyc);

        $kyc->app_user->seller_status = 1;
        $kyc->save();
        $kyc->app_user->save();
  
        $request->session()->forget('kyc');
  
        return redirect()->route('admin.kyc.index', $kyc)->withFlashSuccess(__('Seller KYC was successfully created.'));
    }
}
