<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\AppUser;
use App\Models\TransactionLog;
use App\Exceptions\GeneralException;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AppUserController extends Controller
{
    public function index()
    {
        return view('backend.appusers.index');
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
