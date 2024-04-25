<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SellerContractFile;
use Illuminate\Http\Request;
use App\Models\AppUser;
use App\Models\SellerPending;
use Storage;

class SellerContractFileController extends Controller
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
  
        return view('backend.seller.create_contract_file',compact('app_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'contract_soft_copy' => 'required|mimes:png,jpg,pdf,jpeg',
        // ]);

        $app_user_id = $request->input('app_user_id');
        $contract_soft_copys = $request->file('contract_soft_copy');

        foreach($contract_soft_copys as $contract_soft_copy) {
            $image_file = $contract_soft_copy->store('public/attachment');

            $seller_contract = SellerContractFile::create([
                'app_user_id' => $app_user_id,
                'contract' => $image_file,
            ]);
        }

        $seller_pending = SellerPending::where('app_user_id', $app_user_id)->first();

        if(!$seller_pending) {
            SellerPending::create([
                'app_user_id' => $app_user_id,
                'compnay_registration_file' => 1
            ]);
        } else {
            $seller_pending->contract_file = 1;
            $seller_pending->save();
        }

        // $status = [
        //     'personal_info' => 1,
        //     'business_info' => 1,
        //     'nrc_file' => 1,
        //     'compnay_registration_file' => 1,
        //     'company_extract_file' => 1,
        //     'company_billing_statement_file' => 1,
        //     'business_license_file' => 1,
        //     'bod_resolution_file' => 1,
        //     'contract_file' => 1,
        //     // 'import_export_license_file' => 1
        // ];

        // $pending_update = SellerPending::where('id', $seller_pending->id)->where($status)->first();
        
        // if($pending_update != null) {
        //     $seller_contract->app_user->seller_status = 1;
        //     $seller_contract->app_user->save();
        // }

        return redirect()->route('admin.seller.attachment', $app_user_id)->withFlashSuccess(__('Seller Company Extract Soft Copy was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellerContractFile  $sellerContractFile
     * @return \Illuminate\Http\Response
     */
    public function show(SellerContractFile $sellerContractFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellerContractFile  $sellerContractFile
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerContractFile $sellerContractFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellerContractFile  $sellerContractFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerContractFile $sellerContractFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellerContractFile  $sellerContractFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellerContractFile $sellerContractFile)
    {
        //
    }
}
