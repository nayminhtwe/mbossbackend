<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\StoreBuyerKycRequest;
use App\Http\Requests\Backend\UpdateBuyerKycRequest;
use App\Models\BuyerKyc;
use App\Models\AppUser;
use App\Models\SellerBuyerRequest;
use App\Models\FileUpload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BuyerKycController extends Controller
{
    public function index()
    {
        return view('backend.buyer-kyc.index');
    }

    public function create($app_user_id)
    {
        $app_user = AppUser::findOrfail($app_user_id);
  
        return view('backend.buyer-kyc.create',compact('app_user'));
    }

    public function store(StoreBuyerKycRequest $request)
    {
        $app_user_id = $request->input('app_user_id');
        $validated = $request->validated();

        // $has_image = $request->hasFile('photoFile');
        // if($has_image) {
        //     $store_image = $request->file('photoFile');
        //     $image_file = $store_image->store('public/profile');
        //     $image_url = env('APP_URL'). Storage::url($image_file);
        // } else {
        //     $image_url = null;
        // }

        $nrc_soft_copy = $request->file('nrc_soft_copy');
        $nrc_soft_copy_file = $nrc_soft_copy->store('public/attachment');

        $bank_book_soft_copy = $request->file('bank_book_soft_copy');
        $bank_book_soft_copy_file = $bank_book_soft_copy->store('public/attachment');

        if($request->hasFile('household_registration_soft_copy')) {
            $household_registration_soft_copy = $request->file('household_registration_soft_copy');
            $household_registration_soft_copy_file = $household_registration_soft_copy->store('public/attachment');
        }else {
            $household_registration_soft_copy_file = null;
        }

        if($request->hasFile('authorize_person_nrc_soft_copy')) {
            $authorize_person_nrc_soft_copy = $request->file('authorize_person_nrc_soft_copy');
            $authorize_person_nrc_soft_copy_file = $authorize_person_nrc_soft_copy->store('public/attachment');
        } else {
            $authorize_person_nrc_soft_copy_file = null;
        }

        $userID = Str::uuid()->toString();
        $password = bcrypt($request->input('password'));
        $appIdentifier = 'mboss-invoice-backend';

        $buyer_kyc = BuyerKyc::create([
            'app_user_id' => $app_user_id,
            'name' => $validated['name'],
            'dateOfBirth' => $validated['dateOfBirth'],
            'fatherName' => $validated['fatherName'],
            'nationality' => $validated['nationality'],
            'nrc_or_passport' => $validated['nrc_or_passport'],
            'qualifications' => $validated['qualifications'],
            'occupation' => $validated['occupation'],
            'maritalStatus' => $validated['maritalStatus'],
            'nameOfSpouse' => $validated['nameOfSpouse'],
            'spouse_nrc_or_passport' => $validated['spouse_nrc_or_passport'],
            'permanentAddress' => $validated['permanentAddress'],
            'currentAddress' => $validated['currentAddress'],
            'postalAddress' => $validated['postalAddress'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'employmentNatureOfBusiness' => $validated['employmentNatureOfBusiness'],
            'employmentPosition' => $validated['employmentPosition'],
            'employmentYearsOfService' => $validated['employmentYearsOfService'],
            'employerName' => $validated['employerName'],
            'employerAddress' => $validated['employerAddress'],
            'officeContactNo' => $validated['officeContactNo'],
            'selfEmploymentNatureOfBusiness' => $validated['selfEmploymentNatureOfBusiness'],
            'revenueModel' => $validated['revenueModel'],
            'annualIncome' => $validated['annualIncome'],
            'sourceOfFund' => $validated['sourceOfFund'],
            'bankAcc' => $validated['bankAcc'],
            'bankName' => $validated['bankName'],
            'bankBranch' => $validated['bankBranch'],
            'typeOfAccount' => $validated['typeOfAccount'],
            'contactName' => $validated['contactName'],
            'contact_nrc_or_passport' => $validated['contact_nrc_or_passport'],
            'contactRelationship' => $validated['contactRelationship'],
            'contactNationality' => $validated['contactNationality'],
            'contactPhone' => $validated['contactPhone'],
            'contactEmail' => $validated['contactEmail'],
            'authorizePersonName' => $validated['authorizePersonName'],
            'authorize_person_nrc_or_passport' => $validated['authorize_person_nrc_or_passport'],
            'nrc_soft_copy' => $nrc_soft_copy_file,
            'bank_book_soft_copy' => $bank_book_soft_copy_file,
            'household_registration_soft_copy' => $household_registration_soft_copy_file,
            'authorize_person_nrc_soft_copy' => $authorize_person_nrc_soft_copy_file,
        ]);

        $buyer_kyc->app_user->buyer_status = 1;
        $buyer_kyc->app_user->save();

        return redirect()->route('admin.buyer-kyc.index', $buyer_kyc)->withFlashSuccess(__('Buyer KYC was successfully created.'));
      
    }

    public function show(BuyerKyc $buyer_kyc)
    {
        return view('backend.buyer-kyc.show', compact('buyer_kyc'));
    }

    public function edit(BuyerKyc $buyerKyc)
    {
        return view('backend.buyer-kyc.edit')
            ->withBuyerKyc($buyerKyc);
    }

    public function update(UpdateBuyerKycRequest $request, BuyerKyc $buyerKyc)
    {
        $validated = $request->validated();

        if($request->hasFile('nrc_soft_copy')) {
            Storage::delete($buyerKyc->nrc_soft_copy);
            $nrc = $request->file('nrc_soft_copy');
            $nrc_soft_copy = $nrc->store('public/attachment');
            $buyerKyc->nrc_soft_copy = $nrc_soft_copy;
            $buyerKyc->save();
        }

        if($request->hasFile('nrc_soft_copy')) {
            Storage::delete($buyerKyc->bank_book_soft_copy);
            $bank_book = $request->file('bank_book_soft_copy');
            $bank_book_soft_copy = $bank_book->store('public/attachment');
            $buyerKyc->bank_book_soft_copy = $bank_book_soft_copy;
            $buyerKyc->save();
        }

        if($request->hasFile('household_registration_soft_copy')) {
            $household_registration_soft_copy = $request->file('household_registration_soft_copy');
            $household_registration_soft_copy_file = $household_registration_soft_copy->store('public/attachment');
            $buyerKyc->household_registration_soft_copy = $household_registration_soft_copy_file;
            $buyerKyc->save();
        }

        if($request->hasFile('authorize_person_nrc_soft_copy')) {
            $authorize_person_nrc_soft_copy = $request->file('authorize_person_nrc_soft_copy');
            $authorize_person_nrc_soft_copy_file = $authorize_person_nrc_soft_copy->store('public/attachment');
            $buyerKyc->authorize_person_nrc_soft_copy = $authorize_person_nrc_soft_copy_file;
            $buyerKyc->save();
        }

        $buyerKyc->update([
            'name' => $validated['name'],
            'dateOfBirth' => $validated['dateOfBirth'],
            'fatherName' => $validated['fatherName'],
            'nationality' => $validated['nationality'],
            'nrc_or_passport' => $validated['nrc_or_passport'],
            'qualifications' => $validated['qualifications'],
            'occupation' => $validated['occupation'],
            'maritalStatus' => $validated['maritalStatus'],
            'nameOfSpouse' => $validated['nameOfSpouse'],
            'spouse_nrc_or_passport' => $validated['spouse_nrc_or_passport'],
            'permanentAddress' => $validated['permanentAddress'],
            'currentAddress' => $validated['currentAddress'],
            'postalAddress' => $validated['postalAddress'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'employmentNatureOfBusiness' => $validated['employmentNatureOfBusiness'],
            'employmentPosition' => $validated['employmentPosition'],
            'employmentYearsOfService' => $validated['employmentYearsOfService'],
            'employerName' => $validated['employerName'],
            'employerAddress' => $validated['employerAddress'],
            'officeContactNo' => $validated['officeContactNo'],
            'selfEmploymentNatureOfBusiness' => $validated['selfEmploymentNatureOfBusiness'],
            'revenueModel' => $validated['revenueModel'],
            'annualIncome' => $validated['annualIncome'],
            'sourceOfFund' => $validated['sourceOfFund'],
            'bankAcc' => $validated['bankAcc'],
            'bankName' => $validated['bankName'],
            'bankBranch' => $validated['bankBranch'],
            'typeOfAccount' => $validated['typeOfAccount'],
            'contactName' => $validated['contactName'],
            'contact_nrc_or_passport' => $validated['contact_nrc_or_passport'],
            'contactRelationship' => $validated['contactRelationship'],
            'contactNationality' => $validated['contactNationality'],
            'contactPhone' => $validated['contactPhone'],
            'contactEmail' => $validated['contactEmail'],
            'authorizePersonName' => $validated['authorizePersonName'],
            'authorize_person_nrc_or_passport' => $validated['authorize_person_nrc_or_passport'],
            // 'nrc_soft_copy' => $nrc_soft_copy,
            // 'bank_book_soft_copy' => $bank_book_soft_copy,
            // 'household_registration_soft_copy' => $household_registration_soft_copy_file,
            // 'authorize_person_nrc_soft_copy' => $authorize_person_nrc_soft_copy_file,
        ]);
        
        return redirect()->route('admin.buyer-kyc.index', $buyerKyc)->withFlashSuccess(__('Buyer KYC was successfully updated.'));
    }

    public function app_user_index()
    {
        $app_users = AppUser::where('buyer_status', 0)->get();
  
        return view('backend.buyer-kyc.app_user_index',compact('app_users'));
    }

    public function request()
    {
        return view('backend.buyer-kyc.request');
    }

    public function request_show($app_user_id)
    {
        $files = FileUpload::where('app_user_id', $app_user_id)->where('kyc_status', 0)->whereHas('seller_buyer_request', function ($query) {
            $query->where('kyc_status', 0)->where('buyer_finish_status', 0);
        })->get();
        
        return view('backend.buyer-kyc.request_show', compact('files'));
    }

    public function approve($app_user_id)
    {
        $seller_buyer_request = SellerBuyerRequest::where('app_user_id', $app_user_id)->where('kyc_status', 0)->where('buyer_finish_status', 0)->first();

        if($seller_buyer_request) {

            $buyer_kyc = BuyerKyc::where('app_user_id', $seller_buyer_request->app_user_id)->first();

            if($buyer_kyc) {
                $seller_buyer_request->buyer_finish_status = 1;
                $seller_buyer_request->save();

                $app_user = AppUser::where('id', $seller_buyer_request->app_user_id)->first();
                $app_user->buyer_status = 1;
                $app_user->save();

                return view('backend.buyer-kyc.request');
            } else {
                return redirect()->route('admin.buyer-kyc.request')->with('flash_warning','Buyer KYC Information form is not finished!');
            }
  
        }
    }

}
