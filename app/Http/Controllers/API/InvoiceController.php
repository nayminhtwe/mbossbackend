<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\StoreInvoiceRequest;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoicePhoto;
use App\Models\InvoiceCoverPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\InvoiceResourceCollection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\InvoicePurchaseOrderImage;
use App\Models\InvoiceContractImage;
use App\Models\InvoiceOtherImage;
use App\Models\InvoiceExcelImage;
use App\Models\InvoicePaymentRecordImage;
use App\Models\TransactionLog;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index()
    {
        $app_user = Auth::guard('user-api')->user();

        $invoices = Invoice::where('app_user_id', '!=' , $app_user->id)->where('seller_approval', 1)->orderBy('id', 'desc')->get();

        return new InvoiceResourceCollection($invoices);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'title' => 'required',

            // 'description' => 'required',

            // 'price' => 'required|integer',

            'invoiceID' => 'required',

            'categoryID' => 'required',

            'terms' => 'required',

            'original_invoice' => 'required',

            'date' => 'required'
        ]);
        

        $invoiceID = $request->input('invoiceID');
        $description = $request->input('description');
        $place = $request->input('place');
        $terms = $request->input('terms');
        $category_id = $request->input('categoryID');
        $original_invoice = $request->input('original_invoice');
        $date = $request->input('date');
        $cover_photo = $request->input('photo');
        $uuid = Str::uuid()->toString();

        if ($validator->fails()) {
            return response()->json(['error_code' =>  0,'status' => 1, 'message' => $validator->errors()->first()],  200);
        } else {
            $app_user = Auth::guard('user-api')->user();

            $invoice = Invoice::create([
                'title' => $invoiceID,
                'description' => $description,
                'price' => 0,
                'category_id' => $category_id,
                'app_user_id' => $app_user->id,
                'uuid' => $uuid,
                'place' => $place,
                'terms' => $terms,
                'date' => $date
            ]);

            $original_invoices = $request->file('original_invoice');

            foreach ($original_invoices as $original_invoice) {
                $original_invoice_file = $original_invoice->store('public/invoice');

                InvoicePhoto::create([
                    'invoice_id' => $invoice->id,
                    'photo' => $original_invoice_file
                ]);
            }

            $purchase_order = $request->hasFile('purchase_order');
            if($purchase_order) {
                $request_files = $request->file('purchase_order');
                foreach ($request_files as $request_file) {
                    $purchase_order_file = $request_file->store('public/invoice');
    
                    InvoicePurchaseOrderImage::create([
                        'invoice_id' => $invoice->id,
                        'purchase_order' => $purchase_order_file
                    ]);
                }
            }

            $contract = $request->hasFile('contract');
            if($contract) {
                $request_files = $request->file('contract');
                foreach ($request_files as $request_file) {
                    $contract_file = $request_file->store('public/invoice');
    
                    InvoiceContractImage::create([
                        'invoice_id' => $invoice->id,
                        'contract' => $contract_file
                    ]);
                }
            }

            $other = $request->hasFile('other');
            if($other) {
                $request_files = $request->file('other');
                foreach ($request_files as $request_file) {
                    $other_file = $request_file->store('public/invoice');
    
                    InvoiceOtherImage::create([
                        'invoice_id' => $invoice->id,
                        'other' => $other_file
                    ]);
                }
            }

            $invoice_excel = $request->hasFile('invoice_excel');
            if($invoice_excel) {
                $request_files = $request->file('invoice_excel');
                foreach ($request_files as $request_file) {
                    $invoice_excel_file = $request_file->store('public/invoice');
    
                    InvoiceExcelImage::create([
                        'invoice_id' => $invoice->id,
                        'invoice_excel' => $invoice_excel_file
                    ]);
                }
            }

            $payment_record = $request->hasFile('payment_record');
            if($payment_record) {
                $request_files = $request->file('payment_record');
                foreach ($request_files as $request_file) {
                    $payment_record_file = $request_file->store('public/invoice');
    
                    InvoicePaymentRecordImage::create([
                        'invoice_id' => $invoice->id,
                        'payment_record' => $payment_record_file
                    ]);
                }
            }
    
            if($cover_photo) {
                InvoiceCoverPhoto::create([
                    'invoice_id' => $invoice->id,
                    'photo' => $cover_photo
                ]);
            }
    
            return response()->json(['error_code' => 0,'status' => 0, 'invoice' => $invoice, 'message' => 'Invoice Successfully Created'], 200);
        }
    }

    public function my_invoice_list()
    {
        $app_user = Auth::guard('user-api')->user();

        $invoices = Invoice::where('app_user_id', $app_user->id)->orderBy('id', 'desc')->get();

        return new InvoiceResourceCollection($invoices);
    }

    public function invoice($invoice_id)
    {
        $invoice = Invoice::where('uuid',$invoice_id)->where('seller_approval', 1)->where('purchase', 0)->first();

        return new InvoiceResource($invoice);
    }

    public function invoice_by_category(Request $request)
    {
        $app_user = Auth::guard('user-api')->user();
        $category_id = $request->input('category_id');
        $invoice_amount = $request->input('invoice_amount');
        $terms = $request->input('terms');

        $invoices = Invoice::when($category_id, function ($query) use ($category_id) {
            $query->whereHas('category', function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            });
        })
        ->when($invoice_amount, function ($query) use ($invoice_amount) {
            $query->where('price', '<=', $invoice_amount);
        })
        ->when($terms, function ($query) use ($terms) {
            $query->where('terms','<=', $terms);
        })
        ->when($app_user->id, function ($query) use ($app_user->id) {
            $query->where('app_user_id','!=', $app_user->id);
        })    
        // ->where('app_user_id', '!=', $app_user->id)
        ->where('seller_approval', 1)
        ->where('purchase', 0)
        ->orderBy('id', 'desc')
        ->get();

        return new InvoiceResourceCollection($invoices);
    }

    public function invoice_purchase(Request $request)
    {
        $app_user = Auth::guard('user-api')->user();
        $invoice_id = $request->input('invoice_id');

        if($app_user->buyer_status != 1) {
            return response()->json(['error_code' => 0,'status' => 2, 'message' => 'Please make Buyer Register firstly'], 200);
        } else {
            $invoice = Invoice::where('uuid', $invoice_id)->where('seller_approval', 1)->where('purchase', 0)->first();

            if($invoice) {
                $wallet_amount = $app_user->wallet;

                $purchase_amount = $invoice->purchase_amount;
                
                if($wallet_amount >= $purchase_amount) {
                    $invoice->purchase = true;
                    $invoice->purchase_at = Carbon::now()->toDateTimestring();
                    $invoice->purchase_app_user_id = $app_user->id;
                    $invoice->save();

                    $app_user->wallet -= $purchase_amount;
                    $app_user->save();

                    TransactionLog::create([
                        'app_user_id' => $app_user->id,
                        'invoice_id' => $invoice->id,
                        'amount' => $purchase_amount,
                        'transfer' => 1
                    ]);

                    return response()->json(['error_code' => 0,'status' => 0, 'invoice' => $invoice, 'message' => 'Invoice Successfully Purchased'], 200);
                } else {
                    return response()->json(['error_code' => 0,'status' => 1, 'message' => 'Insufficient Balance'], 200);
                }
            } else {
                return response()->json(['error_code' => 0,'status' => 3, 'message' => 'Something went wrong,Please try again'], 200);
            }
            
        }        
    }

    public function purchased(Request $request)
    {
        $app_user = Auth::guard('user-api')->user();

        $purchased_invoices = Invoice::where('purchase_app_user_id', $app_user->id)->orderBy('id', 'desc')->get();

        return new InvoiceResourceCollection($purchased_invoices);
    }

    public function seller_invoice_approval(Request $request)
    {
        $app_user = Auth::guard('user-api')->user();
        $invoice_id = $request->input('invoice_id');

        $invoice = Invoice::where('uuid', $invoice_id)->where('app_user_id', $app_user->id)->where('status', 1)->first();

        if($invoice) {
            $invoice->seller_approval = 1;
            $invoice->save();

            return response()->json(['error_code' => 0,'status' => 0, 'invoice' => $invoice, 'message' => 'Invoice Successfully Approved'], 200);
        } else {
            return response()->json(['error_code' => 0,'status' => 1, 'message' => 'Something went wrong,Please try again'], 200);
        }
    }

    public function my_approval_invoice_list(Request $request)
    {
        $app_user = Auth::guard('user-api')->user();
        $seller_approval = $request->input('seller_approval');

        $invoices = Invoice::where('app_user_id', $app_user->id)->where('status', 1)->where('seller_approval', $seller_approval)->where('purchase', 0)->orderBy('id', 'desc')->get();

        return new InvoiceResourceCollection($invoices);
    }
}
