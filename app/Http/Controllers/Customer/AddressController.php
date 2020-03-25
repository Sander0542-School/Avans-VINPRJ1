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
        return view('pages.customers.address.show')->with('customer', $customer)->with('address', $address);
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
            'street' => ['required', 'string'],
            'number' => ['required', 'integer'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
        ]);

        $addressDatabase = CustomerAddress::whereId($address->id)->first();

        if ($addressDatabase != null) {
            if ($addressDatabase->update($data)) {
                return redirect()->route('customers.show', $customer)
                    ->with('message', 'Het klant adres is geupdate');
            }
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
            return redirect()->route('customers.show', $customer)->with('message', 'Het klant adres is succesvol verwijderd');
        }

        return redirect()->route('customers.show', $customer)->with('message', 'Het klant adres kon niet worden verwijderd');
    }
}
