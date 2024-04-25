<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppUser;
use App\Models\SellerBodResolutionFile;
use App\Models\SellerPending;
use Storage;

class SellerBodResolutionController extends Controller
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
  
        return view('backend.seller.create_bod_resolution_file',compact('app_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bod_resolution' => 'required|mimes:png,jpg,pdf,jpeg',
        ]);

        $app_user_id = $request->input('app_user_id');
        $bod_resolution = $request->file('bod_resolution');

        $image_file = $bod_resolution->store('public/attachment');

        $seller_bod_resolution_file = SellerBodResolutionFile::create([
            'app_user_id' => $app_user_id,
            'bod_resolution' => $image_file,
        ]);

        $seller_pending = SellerPending::where('app_user_id', $app_user_id)->first();

        if(!$seller_pending) {
            SellerPending::create([
                'app_user_id' => $app_user_id,
                'bod_resolution_file' => 1
            ]);
        } else {
            $seller_pending->bod_resolution_file = 1;
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
            $seller_bod_resolution_file->app_user->seller_status = 1;
            $seller_bod_resolution_file->app_user->save();
        }

        return redirect()->route('admin.seller.attachment', $app_user_id)->withFlashSuccess(__('Seller BOD Resolution was successfully created.'));
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
