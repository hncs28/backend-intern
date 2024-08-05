<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\customers;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    public function getcustomer() {
        $customers = customers::get(['customerUsername','customerPassword','customerID']);
        return response()->json($customers);
    }
    
    public function store(Request $request) {
        try {
            \Log::info('store params', ['params' => $request->all()]);
            $customer = new customers;
            $customer->customerName = $request->input('customerName');
            $customer->customerPhone = $request->input('customerPhone');
            $customer->customerEmail = $request->input('customerEmail');
            $customer->customerUsername = $request->input('customerUsername');
            $customer->customerPassword = Hash::make($request->input('customerPassword'));
            $customer->customerAddress = $request->input('customerAddress');
            $customer->dob=$request->dob;
            $customer->role='1';
            $customer->save();
            \Log::info('store success', ['data' => $customer]);
        } catch(\Exception $exception) {
            \Log::error('store error', ['exception' => $exception]);
            return false;
        }
    }
    
}
