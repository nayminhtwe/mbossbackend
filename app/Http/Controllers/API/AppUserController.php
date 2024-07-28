<?php

namespace App\Http\Controllers\API;

use App\Models\AppUser;
use App\Models\BuyerKyc;
use App\Models\Photo;
use App\Models\SellerPending;
use App\Models\TransactionLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Code;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\TransactionLogResourceCollection;

class AppUserController extends Controller
{
    public function register_with_email(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'appIdentifier' => 'required',

            'email' => 'unique:app_users,email',

            'phone' => 'required',

            'firstName' => 'required',

            'lastName' => '',

            'password' => 'required',

            'dateOfBirth' => 'required',

            'nrc' => 'required|unique:app_users,nrc',

            'permanentAddress' => 'required',

            'currentAddress' => 'required',

            'age' => 'required',

            'bankName' => 'required|regex:/^[a-zA-Z ]+$/',

            'bankAcc' => 'required|min:11|max:17',

            'bankNameOptional' => '',

            'bankAccOptional' => '',

            'seller_buyer_status' => 'required'
        ]);

        $appIdentifier = $request->input('appIdentifier');
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
            return response()->json(['error_code' =>  0,'status' => 1, 'message' => $validator->errors()->first()],  200);
        } else {
            $user = AppUser::where('email', $email)->first();
            if(!$user) {

                if($age < 18) {
                    return response()->json(['error_code' =>  0,'status' => 1, 'message' => 'Age must be above 18'],  200);
                } else {

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
                }

            } else {
                return response()->json(['error_code' => 0, 'status' => 2, 'message' => 'User is already registered'],  200);
            }

            $accessToken = $user->createToken('authToken')->accessToken;

            return response()->json(['error_code' => 0, 'status' => 0, 'user' => $user, 'access_token' => $accessToken, 'message' => 'Registered Successfully'], 200);
        }
    }

    public function login_with_email(Request $request)
    {
        $loginData = $request->validate([

            'email' => 'required|email',

            'password' => 'required'
        ]);

        if (Auth::guard('user')->attempt($loginData)) {
            $accessToken = Auth::guard('user')->user()->createToken('authToken')->accessToken;

            return response()->json(['user' => Auth::guard('user')->user(), 'access_token' => $accessToken, 'message' => 'Login successfully']);
        } else {
            return response()->json(['message' => 'Invalid Credentials, check your details'],  403);
        }
    }

    public function code_request(Request $request)
    {
        $loginData = $request->validate([
            'phone_number' => 'required'
        ]);

        $phone_number = $request->input('phone_number');

        $user = AppUser::where('phone', $phone_number)->first();

        if(!$user) {

            $get_code = 111111;

            $transaction_id = Carbon::now()->timestamp . random_int(10000, 99999);
            
            $code = Code::create([
                'phone_number' => $phone_number,
                'code' => $get_code,
                'transaction_id' => $transaction_id,
            ]);

            return response()->json(['transaction_id' => $code->transaction_id, 'message' => 'Code has been created successfully.'], 200);
        
        } else {

            return response()->json(['error_code' => 0, 'status' => 2, 'message' => 'User is already registered'],  200);

        }
    }

    public function register_with_phone(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'appIdentifier' => 'required',

            'firstName' => 'required',

            'lastName' => '',

            'phone' => 'required',

            'email' => '',

            'password' => 'required',

            'dateOfBirth' => 'required',

            'nrc' => 'required',

            'permanentAddress' => 'required',

            'currentAddress' => 'required',
            
            'age' => 'required',

            'bankName' => '',

            'bankAcc' => '',

            'bankNameOptional' => '',

            'bankAccOptional' => '',

            'code' => 'required',

            'transaction_id' => 'required',

            'seller_buyer_status' => 'required'
        ]);

        $appIdentifier = $request->input('appIdentifier');
        $phone = $request->input('phone');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $photoFile = $request->input('photoFile');
        $dateOfBirth = $request->input('dateOfBirth');
        $nrc = $request->input('nrc');
        $permanentAddress = $request->input('permanentAddress');
        $currentAddress = $request->input('currentAddress');
        $bankName = $request->input('bankName');
        $bankAcc = $request->input('bankAcc');
        $bankNameOptional = $request->input('bankNameOptional');
        $bankAccOptional = $request->input('bankAccOptional');
        $input_code = $request->input('code');
        $transaction_id = $request->input('transaction_id');
        $age = $request->input('age');
        $seller_buyer_status = $request->input('seller_buyer_status');

        if ($validator->fails()) {
            return response()->json(['error_code' =>  0,'status' => 1, 'message' => $validator->errors()->first()],  200);
        } else {
            $user = AppUser::where('phone', $phone)->first();
            if(!$user) {
                // $code = Code::where('phone_number', $phone)->where('code', $input_code)->where('transaction_id', $transaction_id)->first();

                // if($code) {

                    Code::create([
                        'phone_number' => $phone,
                        'code' => $input_code,
                        'transaction_id' => $transaction_id,
                        'isUsed' => 1
                    ]);

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

                    // $code->isUsed = true;
                    // $code->save();
                    
                // } else {
                //     return response()->json(['error_code' => 0,'status' => 3, 'message' => 'Your OTP is wrong'],  200);
                // }
                
            } else {
                return response()->json(['error_code' => 0, 'status' => 2, 'message' => 'User is already registered'],  200);
            }

            $accessToken = $user->createToken('authToken')->accessToken;

            return response()->json(['error_code' => 0, 'status' => 0, 'user' => $user, 'access_token' => $accessToken, 'message' => 'Registered Successfully'], 200);
        }
    }

    public function profile()
    {
        $user = Auth::guard('user-api')->user();

        if($user) {
            $user = AppUser::where('id', $user->id)->first();

            return (new ProfileResource($user));
        } else {
            return response()->json(['message' => 'Invalid Credentials, check your details'],  403);
        }
    }

    public function login_with_phone(Request $request)
    {
        $loginData = $request->validate([

            'phone' => 'required',

            'password' => 'required'
        ]);

        if (Auth::guard('user')->attempt($loginData)) {
            $accessToken = Auth::guard('user')->user()->createToken('authToken')->accessToken;

            return response()->json(['user' => Auth::guard('user')->user(), 'access_token' => $accessToken, 'message' => 'Login successfully']);
        } else {
            return response()->json(['message' => 'Invalid Credentials, check your details'],  403);
        }
    }

    public function photo(Request $request)
    {
        $validator = $request->validate([
            'photo' => 'required'
        ]);

        $has_image = $request->hasFile('photo');

        if($has_image) {
            $request_photo = $request->file('photo');
            $file = $request_photo->store('public/photo');

            $photo = Photo::create([
                'photo' => $file
            ]);
        }

        return response()->json(['downloadURL' => $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'] . Storage::url($photo->photo)],  200);
    }

    public function profile_image(Request $request)
    {
        $app_user = Auth::guard('user-api')->user();
        $profile_image = $request->file('profile_image');

        $current_image = $app_user->profilePictureURL;
        if($current_image) {
            $img = str_replace(env('APP_URL').'/storage/profile/', '', $current_image);
            Storage::delete('public/profile/'.$img);
        }
        $image_file = $profile_image->store('public/profile');
        $profilePictureURL = env('APP_URL'). Storage::url($image_file);

        $app_user->profilePictureURL = $profilePictureURL;
        $app_user->save();

        return response()->json(['message' => 'Profile Image Updated Successfully'],  200);
    }

    public function transaction_log()
    {
        $user = Auth::guard('user-api')->user();

        if($user) {
            $user = TransactionLog::where('app_user_id', $user->id)->orderBy('id', 'desc')->get();

            return (new TransactionLogResourceCollection($user));
        } else {
            return response()->json(['message' => 'Invalid Credentials, check your details'],  403);
        }
    }
}
