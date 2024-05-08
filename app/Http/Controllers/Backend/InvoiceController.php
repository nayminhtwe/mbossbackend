<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Category;
use Exception;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        // $invoices = Invoice::where('status', '0')->get();
        // return view('admin.invoice')->with(['invoices' => $invoices]);
        return view('backend.invoices.pending');

    }

    public function show(Invoice $invoice)
    {
        return view('backend.invoices.show', compact('invoice'));
    }

    public function get_invoice_approve($invoice)
    {
        $invoice = Invoice::findOrfail($invoice);
  
        return view('backend.invoices.invoice_approve',compact('invoice'));
    }

    public function invoice_approve(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'price' => 'required|integer',
            'purchase_amount' => 'required|integer',
            'receivable_amount' => 'required|integer',
            'discount_rate' => 'required',
            'invoice_issued_date' => 'required',
            'invoice_selling_date' => 'required',
            'invoice_due_date' => 'required',
            'remaining_day' => 'required',
            'day_delays' => 'required',
            'daily_discount_rate' => 'required',
            'seller_discount_rate' => 'required',
            'discounted_amount' => 'required',
            'service_fees' => 'required',
            'service_fee_amount' => 'required',
            'seller_receivable_amount' => 'required',
        ]);

        $id = $request->input('id');
        $price = $request->input('price');
        $purchase_amount = $request->input('purchase_amount');
        $receivable_amount = $request->input('receivable_amount');
        $discount_rate = $request->input('discount_rate');
        $invoice_issued_date = $request->input('invoice_issued_date');
        $invoice_selling_date = $request->input('invoice_selling_date');
        $invoice_due_date = $request->input('invoice_due_date');
        $remaining_day = $request->input('remaining_day');
        $day_delays = $request->input('day_delays');
        $daily_discount_rate = $request->input('daily_discount_rate');
        $seller_discount_rate = $request->input('seller_discount_rate');
        $discounted_amount = $request->input('discounted_amount');
        $service_fees = $request->input('service_fees');
        $service_fee_amount = $request->input('service_fee_amount');
        $seller_receivable_amount = $request->input('seller_receivable_amount');
        $discounted_amount_int = (int) $discounted_amount;

        $invoice = Invoice::findOrfail($id);

        $invoice->price = $price;
        $invoice->purchase_amount = $purchase_amount;
        $invoice->receivable_amount = $receivable_amount;
        $invoice->discount = $discount_rate;
        $invoice->invoice_issued_date = $invoice_issued_date;
        $invoice->invoice_selling_date = $invoice_selling_date;
        $invoice->date = $invoice_due_date;
        $invoice->remaining_day = $remaining_day;
        $invoice->day_delays = $day_delays;
        $invoice->daily_discount_rate = $daily_discount_rate;
        $invoice->seller_discount_rate = $seller_discount_rate;
        $invoice->discounted_amount = $discounted_amount_int;
        $invoice->service_fees = $service_fees;
        $invoice->service_fee_amount = $service_fee_amount;
        $invoice->seller_receivable_amount = $seller_receivable_amount;
        $invoice->status = 1;
        $invoice->save();

        return redirect()->route('admin.invoice.finished', $invoice)->withFlashSuccess(__('Invoice have been approved successfully.'));
    }

    public function finished()
    {
        return view('backend.invoices.finished');
    }

    public function purchased()
    {
        return view('backend.invoices.purchased');
    }

    public function purchased_status()
    {
        return view('backend.invoices.purchased_status');
    }

    public function purchased_finish($invoice_id)
    {
        $invoice = Invoice::where('id', $invoice_id)->where('status', '1')->where('purchase', 1)->first();

        if($invoice) {

            $invoice->finish_status = 1;
            $invoice->save();

            return redirect()->route('admin.invoice.purchased_status', $invoice)->withFlashSuccess(__('Changed Invoice purchased status to Finished.'));
        } else {
            return redirect()->route('admin.invoice.purchased_status')->with('flash_warning','This invoice have no more!');
        }
    }

    public function purchased_pending($invoice_id)
    {
        $invoice = Invoice::where('id', $invoice_id)->where('status', '1')->where('purchase', 1)->first();

        if($invoice) {

            $invoice->finish_status = 2;
            $invoice->save();

            return redirect()->route('admin.invoice.purchased_status', $invoice)->withFlashSuccess(__('Changed Invoice purchased status to Pending.'));
        } else {
            return redirect()->route('admin.invoice.purchased_status')->with('flash_warning','This invoice have no more!');
        }
    }

    public function purchased_default($invoice_id)
    {
        $invoice = Invoice::where('id', $invoice_id)->where('status', '1')->where('purchase', 1)->first();

        if($invoice) {

            $invoice->finish_status = 3;
            $invoice->save();

            return redirect()->route('admin.invoice.purchased_status', $invoice)->withFlashSuccess(__('Changed Invoice purchased status to Default.'));
        } else {
            return redirect()->route('admin.invoice.purchased_status')->with('flash_warning','This invoice have no more!');
        }
    }

    public function purchased_finished_list()
    {
        return view('backend.invoices.purchased_finished_list');
    }

    public function purchased_delayed_list()
    {
        return view('backend.invoices.purchased_delayed_list');
    }

    public function purchased_default_list()
    {
        return view('backend.invoices.purchased_default_list');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete_status = 0;
        $invoice->save();
        $invoice->delete();

        if($invoice->status == 0) {
            return redirect()->route('admin.invoice.index')->withFlashSuccess('Invoice deleted successfully');
        } elseif($invoice->status == 1) {
            return redirect()->route('admin.invoice.finished')->withFlashSuccess('Invoice deleted successfully');
        }
    }

    public function edit(Invoice $invoice)
    {
        $categories = Category::all();
        return view('backend.invoices.edit', compact('invoice', 'categories'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $categoryID = $request->input('categoryID');
        $place = $request->input('place');
        $terms = $request->input('terms');
        $original_amount = $request->input('price');
        $purchase_amount = $request->input('purchase_amount');
        $receivable_amount = $request->input('receivable_amount');
        $discount_rate = $request->input('discount_rate');
        $invoice_issued_date = $request->input('invoice_issued_date');
        $invoice_selling_date = $request->input('invoice_selling_date');
        $invoice_due_date = $request->input('invoice_due_date');
        $remaining_day = $request->input('remaining_day');
        $day_delays = $request->input('day_delays');
        $daily_discount_rate = $request->input('daily_discount_rate');
        $seller_discount_rate = $request->input('seller_discount_rate');
        $discounted_amount = $request->input('discounted_amount');
        $service_fees = $request->input('service_fees');
        $service_fee_amount = $request->input('service_fee_amount');
        $seller_receivable_amount = $request->input('seller_receivable_amount');

        DB::beginTransaction();

        try {
            $invoice->update([
                'title' => $title,
                'description' => $description,
                'category_id' => $categoryID,
                'place' => $place,
                'terms' => $terms,
                'date' => $invoice_due_date,
                'price' => $original_amount,
                'purchase_amount' => $purchase_amount,
                'receivable_amount' => $receivable_amount,
                'discount' => $discount_rate,
                'invoice_issued_date' => $invoice_issued_date,
                'invoice_selling_date' => $invoice_selling_date,
                'remaining_day' => $remaining_day,
                'day_delays' => $day_delays,
                'daily_discount_rate' => $daily_discount_rate,
                'seller_discount_rate' => $seller_discount_rate,
                'discounted_amount' => $discounted_amount,
                'service_fees' => $service_fees,
                'service_fee_amount' => $service_fee_amount,
                'seller_receivable_amount' => $seller_receivable_amount
            ]);

            DB::commit();

            return redirect()->route('admin.invoice.finished', $invoice)->withFlashSuccess(__('Invoice was successfully updated.'));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the Invoice. Please try again.'));
        }
    }

    public function seller_approved_invoice_list()
    {
        return view('backend.invoices.seller_approved_list');
    }

    public function deleted_invoice_list()
    {
        return view('backend.invoices.deleted');
    }

    public function end_sale($invoice_id)
    {
        $invoice = Invoice::where('id', $invoice_id)->where('status', '1')->first();

        if($invoice) {
            $invoice->delete_status = 1;
            $invoice->save();
            $invoice->delete();

            return redirect()->route('admin.invoice.sale_ended_invoice_list', $invoice)->withFlashSuccess(__('Invoice Sale is end & Successfully Deleted'));
        }
    }

    public function sale_ended_invoice_list()
    {
        return view('backend.invoices.sale_ended_list');
    }

    public function get_purchased_finish_after_delay($invoice)
    {
        $invoice = Invoice::findOrfail($invoice);

        return view('backend.invoices.finished_after_delay',compact('invoice'));
    }

    public function purchased_finish_after_delay(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required',
            'extra_day_delay' => 'required',
            'extra_daily_rate' => 'required',
            'extra_service_fee' => 'required',
            'repayment_amount' => 'required',
        ]);

        $invoice_id = $request->input('invoice_id');
        $extra_day_delay = $request->input('extra_day_delay');
        $extra_daily_rate = $request->input('extra_daily_rate');
        $extra_service_fee = $request->input('extra_service_fee');
        $repayment_amount = $request->input('repayment_amount');

        $invoice = Invoice::where('id', $invoice_id)->where('status', '1')->where('purchase', 1)->first();

        if($invoice) {
            $invoice->extra_day_delay = $extra_day_delay;
            $invoice->extra_daily_rate = $extra_daily_rate;
            $invoice->extra_service_fee = $extra_service_fee;
            $invoice->repayment_amount = $repayment_amount;
            $invoice->finish_status = 1;
            $invoice->save();

            return redirect()->route('admin.invoice.purchased_finished_list', $invoice)->withFlashSuccess(__('Changed Invoice purchased status to Finished.'));
        } else {
            return redirect()->route('admin.invoice.purchased_finished_list')->with('flash_warning','This invoice have no more!');
        }
    }

    public function purchased_finished_after_delay_list()
    {
        return view('backend.invoices.purchased_finished_after_delay_list');
    }
}
