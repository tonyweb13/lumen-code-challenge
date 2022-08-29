<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get(['name', 'email', 'country']);
        return response()->json($customers);
    }

    public function show($customerId)
    {
        $customer = Customer::find($customerId);
        return response()->json($customer);
    }
}
