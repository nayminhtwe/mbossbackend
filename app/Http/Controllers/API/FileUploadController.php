<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\FileUpload;
use App\Models\SellerBuyerRequest;
use App\Models\SellerCompanyExtractFileRes;
use App\Models\SellerBusinessLicenseFileRes;
use App\Models\SellerBodResolutionFileRes;
use App\Models\SellerImExLicenseFileRes;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'files' => 'required',

            'kyc_status' => 'required|integer'
        ]);
        
        $kyc_status = $request->input('kyc_status');

        if ($validator->fails()) {
            return response()->json(['error_code' =>  0,'status' => 1, 'message' => $validator->errors()->first()],  200);
        } else {
            $app_user = Auth::guard('user-api')->user();

            $has_file = $request->hasFile('files');

            if($has_file) {
                $request_files = $request->file('files');

                if($kyc_status == 1) {
                    $app_user->seller_request_count = $app_user->seller_request_count +1;
                    $app_user->seller_submitted = 1;
                    $app_user->save();
                } elseif ($kyc_status == 0) {
                    $app_user->buyer_request_count = $app_user->buyer_request_count +1;
                    $app_user->buyer_submitted = 1;
                    $app_user->save();
                }

                $seller_buyer_request = SellerBuyerRequest::create([
                    'app_user_id' => $app_user->id,
                    'seller_upload_count' => $app_user->seller_request_count,
                    'buyer_upload_count' => $app_user->buyer_request_count,
                    'kyc_status' => $kyc_status
                ]);

                foreach ($request_files as $file) {
                    $file_name = $file->getClientOriginalName();
                    $file_name = pathinfo($file_name, PATHINFO_FILENAME);
                    $store_file = $file->store('public/upload_file');

                    $FileUpload =FileUpload::create([
                        'name' => $file_name,
                        'file' => $store_file,
                        'app_user_id' => $app_user->id,
                        'kyc_status' => $kyc_status,
                        'seller_buyer_request_id' => $seller_buyer_request->id
                    ]);
                }

                if($kyc_status == 1) {
                    $company_extract = $request->hasFile('company_extract');
                    if($company_extract) {
                        $request_files = $request->file('company_extract');
                        foreach ($request_files as $request_file) {
                        $company_extract_file = $request_file->store('public/upload_file');
        
                        SellerCompanyExtractFileRes::create([
                            'name' => 'Company Extract File',
                            'file' => $company_extract_file,
                            'app_user_id' => $app_user->id,
                            'kyc_status' => $kyc_status,
                            'seller_buyer_request_id' => $seller_buyer_request->id
                            ]);
                        }
                    }

                    $business_license = $request->hasFile('business_license');
                    if($business_license) {
                        $request_files = $request->file('business_license');
                        foreach ($request_files as $request_file) {
                        $business_license_file = $request_file->store('public/upload_file');
        
                        SellerBusinessLicenseFileRes::create([
                            'name' => 'Business License File',
                            'file' => $business_license_file,
                            'app_user_id' => $app_user->id,
                            'kyc_status' => $kyc_status,
                            'seller_buyer_request_id' => $seller_buyer_request->id
                            ]);
                        }
                    }

                    $bod_resolution = $request->hasFile('bod_resolution');
                    if($bod_resolution) {
                        $request_files = $request->file('bod_resolution');
                        foreach ($request_files as $request_file) {
                        $bod_resolution_file = $request_file->store('public/upload_file');
        
                        SellerBodResolutionFileRes::create([
                            'name' => 'BOD Resolution File',
                            'file' => $bod_resolution_file,
                            'app_user_id' => $app_user->id,
                            'kyc_status' => $kyc_status,
                            'seller_buyer_request_id' => $seller_buyer_request->id
                            ]);
                        }
                    }

                    $import_export_license = $request->hasFile('import_export_license');
                    if($import_export_license) {
                        $request_files = $request->file('import_export_license');
                        foreach ($request_files as $request_file) {
                        $import_export_license_file = $request_file->store('public/upload_file');
        
                        SellerImExLicenseFileRes::create([
                            'name' => 'Import Export License File',
                            'file' => $import_export_license_file,
                            'app_user_id' => $app_user->id,
                            'kyc_status' => $kyc_status,
                            'seller_buyer_request_id' => $seller_buyer_request->id
                            ]);
                        }
                    }
                }

            return response()->json(['error_code' => 0,'status' => 0, 'message' => 'File Successfully Created'], 200);

            }
    
        }
    }
}
