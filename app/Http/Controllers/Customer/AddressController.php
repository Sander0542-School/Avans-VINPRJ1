<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use App\Models\Customer;

class AddressController extends Controller
{
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
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:11', 'regex:/[0-9]+[a-z]*?$/'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zipcode' => ['required', 'string', 'max:7', 'regex:/[0-9]{4}\s?[A-Z]{2}$/'],
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
    public function update(Request $request, Customer $customer, CustomerAddress $address)
    {
        $data = $request->validate([
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:11', 'regex:/[0-9]+[a-z]*?$/'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zipcode' => ['required', 'string', 'max:7', 'regex:/[0-9]{4}\s?[A-Z]{2}$/'],
        ]);

        if ($address->update($data)) {
            return redirect()->route('customers.show', $address->customer)->with('message', 'Het klant adres is geupdate');
        }

        return redirect()->back()->with('message', 'De klant adres kon niet geupdate worden');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerAddress  $customerAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, CustomerAddress $address)
    {
        if ($address->delete()) {
            return redirect()->route('customers.show', $address->customer)->with('message', 'Het klant adres is succesvol verwijderd');
        }

        return redirect()->route('customers.show', $address->customer)->with('message', 'Het klant adres kon niet worden verwijderd');
    }
}
