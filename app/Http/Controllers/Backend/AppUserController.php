<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\AppUser;
use App\Models\TransactionLog;
use App\Exceptions\GeneralException;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\SellerPending;

class AppUserController extends Controller
{
    public function index()
    {
        return view('backend.appusers.index');
    }

    public function create()
    {
        return view('backend.appusers.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'unique:app_users,email',

            'phone' => 'required',

            'firstName' => 'required',

            'lastName' => '',

            'password' => 'required',

            'dateOfBirth' => 'required',

            'nrc' => 'required',

            'permanentAddress' => 'required',

            'currentAddress' => 'required',

            'age' => 'required',

            'bankName' => 'required',

            'bankAcc' => 'required',

            'bankNameOptional' => '',

            'bankAccOptional' => '',

            'seller_buyer_status' => 'required'
        ]);

        $email = $request->input('email');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $password = bcrypt($request->input('password'));
        $photoFile = $request->input('photoFile');
        $phone = $request->input('phone');
        $dateOfBirth = $request->input('dateOfBirth');
        $nrc = $request->input('nrc');
        $currentAddress = $request->input('currentAddress');
        $permanentAddress = $request->input('permanentAddress');
        $age = $request->input('age');
        $bankName = $request->input('bankName');
        $bankAcc = $request->input('bankAcc');
        $bankNameOptional = $request->input('bankNameOptional');
        $bankAccOptional = $request->input('bankAccOptional');
        $seller_buyer_status = $request->input('seller_buyer_status');

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user = AppUser::where('email', $email)->first();
            if(!$user) {

                $appIdentifier = 'mboss-invoice-android';
                $has_image = $request->hasFile('photoFile');

                if($has_image) {
                    $store_image = $request->file('photoFile');
                    $image_file = $store_image->store('public/profile');
                    $image_url = env('APP_URL'). Storage::url($image_file);
                } else {
                    $image_url = null;
                }

                $userID = Str::uuid()->toString();

                $user = AppUser::create([
                    'userID' => $userID,
                    'email' => $email,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'appIdentifier' => $appIdentifier,
                    'password' => $password,
                    'phone' => $phone,
                    'date_of_birth' => $dateOfBirth,
                    'nrc' => $nrc,
                    'currentAddress' => $currentAddress,
                    'permanentAddress' => $permanentAddress,
                    'age' => $age,
                    'bankName' => $bankName,
                    'bankAcc' => $bankAcc,
                    'bankNameOptional' => $bankNameOptional,
                    'bankAccOptional' => $bankAccOptional,
                    'profilePictureURL' => $image_url,
                    'seller_buyer_status' => $seller_buyer_status,
                    'wallet' => 0,
                    'seller_status' => 0,
                    'buyer_status' => 0,
                    'seller_request_count' => 0,
                    'buyer_request_count' => 0,
                    'seller_submitted' => 0,
                    'buyer_submitted' => 0
                ]);

                SellerPending::create([
                    'app_user_id' => $user->id,
                    'personal_info' => 0,
                    'business_info' => 0,
                    'nrc_file' => 0,
                    'compnay_registration_file' => 0,
                    'company_extract_file' => 0,
                    'company_billing_statement_file' => 0,
                    'business_license_file' => 0,
                    'bod_resolution_file' => 0,
                    'import_export_license_file' => 0
                ]);

                return redirect()->route('admin.appuser.index', $user)->withFlashSuccess(__('App User was successfully created.'));

            } else {
                return view('backend.appusers.create');
            }
        }
    }

    public function wallet()
    {
        $user = AppUser::where('seller_status', 1)->orWhere('buyer_status', 1)->get();

        return view('backend.appusers.wallet');
    }

    public function wallet_create(AppUser $app_user)
    {
        return view('backend.appusers.wallet_create',compact('app_user'));
    }

    public function wallet_store(Request $request,AppUser $app_user)
    {
        $request->validate([
            'wallet' => 'required',
        ]);

        $wallet = $request->input('wallet');
        
        DB::beginTransaction();

        try {
            $app_user->wallet += $wallet;
            $app_user->save();

            TransactionLog::create([
                'app_user_id' => $app_user->id,
                'amount' => $wallet,
                'received' => 1
            ]);

            DB::commit();

            return redirect()->route('admin.wallet', $app_user)->withFlashSuccess(__('Wallet Topup was successfully updated.'));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem for topup the wallet. Please try again.'));
        }
    }

    public function transaction_log()
    {
        $transaction_log = TransactionLog::orderBy('id', 'desc')->get();

        return view('backend.appusers.transaction_log');
    }

    public function resetform(AppUser $app_user)
    {
        return view('backend.appusers.resetpassword', compact('app_user'));
    }

    public function resetpassword(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        $app_user_id = $request->input('app_user_id');
        $app_user_pw = bcrypt($request->input('password'));
        
        DB::beginTransaction();

        try {
            $app_user = AppUser::find($app_user_id);
            $app_user->password = $app_user_pw;
            $app_user->save();

            DB::commit();

            return redirect()->route('admin.appuser.index', $app_user)->withFlashSuccess(__('Password Reset Successfully.'));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem for topup the wallet. Please try again.'));
        }
    }
}
