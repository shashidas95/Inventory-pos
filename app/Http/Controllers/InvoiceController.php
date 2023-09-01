<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\InvoiceProduct;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function InvoicePage()
    {
        return view('pages.dashboard.invoice-page');
    }
    public function InvoiceProductPage()
    {
        return view('pages.dashboard.report-page');
    }
    public function InvoiceCreate(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id = $request->header('id');
            $customer_id = $request->input('customer_id');
            $total = $request->input('total');
            $vat = $request->input('vat');
            $discount = $request->input('discount');
            $payable = $request->input('payable');

            // Create the invoice and get its ID
            $invoice = Invoice::where('user_id', $user_id)->create([
                'total' => $total,
                'discount' => $discount,
                'vat' => $vat,
                'payable' => $payable,
                'customer_id' => $customer_id,
                'user_id' => $user_id
            ]);
            // Get the invoice ID
            $invoice_id = $invoice->id;


            $products = $request->input('products');
            foreach ($products as $product) {
                InvoiceProduct::where('user_id', $user_id)->create([
                    'user_id' => $user_id,
                    'invoice_id' => $invoice_id,
                    'quantity' => $product['quantity'],
                    'sale_price' => $product['sale_price'],
                    'product_id' => $product['product_id'],
                ]);
            }
            DB::commit();
            return 1;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
    public function InvoiceSelect(Request $request)
    {
        $user_id = $request->header('id');
        return Invoice::where('user_id', $user_id)->with('customer')->get();
    }
    public function InvoiceDetails(Request $request)
    {
        $user_id = $request->header('id');
        $InvoiceTotal = Invoice::where('user_id', $user_id)->where('id', $request->input('inv_id'))->first();
        $customerDetails = Customer::where('user_id', $user_id)->where('id', $request->input('cus_id'))->first();
        $InvoiceProducts = InvoiceProduct::where('user_id', $user_id)->where('invoice_id', $request->input('inv_id'))->get();

        return array(
            'customer' => $customerDetails,
            'invoice' => $InvoiceTotal,
            'product' => $InvoiceProducts
        );
    }
    public function InvoiceDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id = $request->header('id');

            InvoiceProduct::where('user_id', $user_id)->where('invoice_id', $request->input('inv_id'))->delete();
            Invoice::where('user_id', $user_id)->where('id', $request->input('inv_id'))->delete();
            DB::commit();
            return 1;
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
