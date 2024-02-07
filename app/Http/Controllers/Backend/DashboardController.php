<?php

namespace App\Http\Controllers\Backend;

use App\Models\AppUser;
use App\Models\Invoice;
use App\Models\Kyc;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $buyer_count = AppUser::where('buyer_status', 1)->count();
        $seller_count = AppUser::where('seller_status', 1)->count();
        $invoice_count = Invoice::where('status', 1)->count();
        $invoice_request_count = Invoice::where('status', 0)->count();

        return view('backend.dashboard')->with(['buyer_count' => $buyer_count, 'seller_count' => $seller_count, 'invoice_count' => $invoice_count, 'invoice_request_count' => $invoice_request_count]);
    }
}
