<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $customers = Customer::all();

        return view('admin.customers.index', compact('customers'));
    }

    public function create() {
        return view('admin.customers.create');
    }

    public function edit(Customer $customer) {
        return view('admin.customers.edit', [
            'customer' => $customer
        ]);
    }

    public function destroy(Customer $customer) {
        $customer->delete();

        return redirect('/admin/customers')->with('delete', 'ok');
    }
 
}
