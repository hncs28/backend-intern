<?php

namespace App\Http\Controllers;
use App\Models\Front\customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        
        $credentials = $request->validate([
            'customerUsername' => 'required',
            'customerPassword' => 'required',
        ]);
        $customer = customers::where('customerUsername', $request->customerUsername)->first();
        \Log::info('Customer found', ['customer' => $customer]);
        if ($customer && Hash::check($request->customerPassword, $customer->customerPassword)) {
           
            $check = Auth::guard('api')->attempt(['customerUsername' => $credentials['customerUsername'], 'password' => $credentials['customerPassword']]);
            \Log::info('Auth params', ['params' => $credentials]);
            \Log::info('Auth check', ['check' => $check]);
            
            if ($check) {

                return response()->json(['message' => 'Login successful', 'customer' => $customer]);
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        }
        return response()->json(['message' => 'Invalid customer'], 401);
    }
}
