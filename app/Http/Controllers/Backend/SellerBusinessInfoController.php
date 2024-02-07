<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppUser;
use App\Models\SellerBusinessInfo;
use App\Models\SellerPending;
use App\Http\Requests\Backend\StoreSellerBusinessInfoRequest;

class SellerBusinessInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($app_user_id)
    {
        $app_user = AppUser::findOrfail($app_user_id);
  
        return view('backend.seller.create_business_info',compact('app_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellerBusinessInfoRequest $request)
    {
        $app_user_id = $request->input('app_user_id');
        $validated = $request->validated();

        $seller_business_info = SellerBusinessInfo::create([
            'app_user_id' => $app_user_id,
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

        $seller_pending = SellerPending::where('app_user_id', $app_user_id)->first();

        if(!$seller_pending) {
            SellerPending::create([
                'app_user_id' => $app_user_id,
                'business_info' => 1
            ]);
        } else {
            $seller_pending->business_info = 1;
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
            // 'import_export_license_file' => 1
        ];

        $pending_update = SellerPending::where('id', $seller_pending->id)->where($status)->first();
        
        if($pending_update != null) {
            $seller_business_info->app_user->seller_status = 1;
            $seller_business_info->app_user->save();
        }

        return redirect()->route('admin.personal-info.app_user', $seller_business_info)->withFlashSuccess(__('Seller Business Information was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
