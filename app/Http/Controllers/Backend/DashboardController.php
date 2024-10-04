<?php

namespace App\Http\Controllers\Backend;

use App\Models\AppUser;
use App\Models\Invoice;
use App\Models\Kyc;
use App\Domains\Auth\Models\User;
use Carbon\Carbon;

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

        $admin = User::count();
        $users = AppUser::count();


        $invoice_data = Invoice::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year) // Filter for the current year
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Create an array of months for labels
        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        $invoice_report = [];
        foreach ($months as $month_number => $month_name) {
            $invoice_report[] = [
                'month' => $month_name,
                'count' => $invoice_data[$month_number] ?? 0
            ];
        }



        $monthlyPurchaseInvoices = Invoice::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->where('purchase', 1)
            ->groupByRaw('MONTH(created_at)')
            ->pluck('count', 'month')->toArray();

        $monthlyFinishedInvoices = Invoice::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->where('finish_status', 1)
            ->groupByRaw('MONTH(created_at)')
            ->pluck('count', 'month')->toArray();

        $months = range(1, 12);

        $purchaseData = [];
        $finishedData = [];

        foreach ($months as $month) {
            $purchaseData[] = $monthlyPurchaseInvoices[$month] ?? 0;
            $finishedData[] = $monthlyFinishedInvoices[$month] ?? 0;
        }

        $monthlyServiceFees = Invoice::selectRaw('MONTH(created_at) as month, SUM(service_fee_amount) as total_fee')
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total_fee', 'month')->toArray();

        $months = range(1, 12);

        $serviceFeeData = [];

        foreach ($months as $month) {
            $serviceFeeData[] = $monthlyServiceFees[$month] ?? 0;
        }
        return view('backend.dashboard')->with(['buyer_count' => $buyer_count, 'seller_count' => $seller_count, 'invoice_count' => $invoice_count, 'invoice_request_count' => $invoice_request_count, 'admin' => $admin, 'users' => $users, 'invoice_report' => $invoice_report, 'purchaseData' => $purchaseData, 'finishedData' => $finishedData,'serviceFeeData'=>$serviceFeeData]);
    }
}
