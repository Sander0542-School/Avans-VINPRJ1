<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use App\Models\Customer;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        return view('pages.customers.address.create')->with('customer', $customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'street' => ['required', 'string'],
            'number' => ['required', 'integer'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
        ]);

        $data = array_merge($data, [
            'customer_id' => $customer->id
        ]);

        $customerAddress = CustomerAddress::create($data);

        if ($customerAddress->exists) {
            return redirect()->route('customers.show', $customer)->with('message', 'Het adres is toegevoegd');
        }

        return redirect()->back()->with('message', 'Het adres kon niet worden toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, CustomerAddress $address)
    {
        return view('pages.customers.address.show')->with('address', $address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerAddress $customerAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerAddress $customerAddress)
    {
        //
    }
}
