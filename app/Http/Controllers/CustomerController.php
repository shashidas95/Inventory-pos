<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function CustomerPage(Request $request)
    {
        return view('pages.dashboard.customer-page');
    }
    public function ListCustomer(Request $request)
    {
        $user_id = $request->header('id');
        return Customer::where('user_id', $user_id)->get();
    }
    public function CustomerCreate(Request $request)
    {
        $user_id = $request->header('id');
        return Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'user_id' => $user_id
        ]);
    }
    public function CustomerUpdate(Request $request)
    {
        $user_id = $request->header('id');
        $customer_id = $request->input('id');
        return Customer::where('id', $customer_id)->where('user_id', $user_id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
        ]);
    }
    public function CustomerDelete(Request $request)
    {
        $user_id = $request->header('id');
        $customer_id = $request->input('id');
        return Customer::where('id', $customer_id)->where('user_id', $user_id)->delete();
    }
    public function CustomerById(Request $request)
    {
        $user_id = $request->header('id');
        $customer_id = $request->input('id');
        return Customer::where('id', $customer_id)->where('user_id', $user_id)->first();
    }
}
