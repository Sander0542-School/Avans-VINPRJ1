<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CustomerContact;
use Illuminate\Http\Request;
use App\Models\Customer;

class ContactsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        return view('pages.customers.contacts.create')->with('customer', $customer);
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
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'jobtitle' => ['required', 'string'],
        ]);

        $data = array_merge($data, [
            'customer_id' => $customer->id
        ]);

        $customerContact = CustomerContact::create($data);

        if ($customerContact->exists) {
            return redirect()->route('customers.show', $customer)->with('message', 'Het contact is toegevoegd');
        }

        return redirect()->back()->with('message', 'Het contact kon niet worden toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, CustomerContact $contact)
    {
        return view('pages.customers.contacts.show')->with('customer', $customer)->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, CustomerContact $contact)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'jobtitle' => ['required', 'string'],
        ]);

        $addressDatabase = CustomerContact::whereId($contact->id)->first();

        if ($addressDatabase != null) {
            if ($addressDatabase->update($data)) {
                return redirect()->route('customers.show', $customer)
                    ->with('message', 'Het klant contact is geupdate');
            }
        }

        return redirect()->back()->with('message', 'De gegevens van het contact konden niet bewerkt worden');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, CustomerContact $contact)
    {
        if ($contact->delete()) {
            return redirect()->route('customers.show', $customer)->with('message', 'Het klant contact is succesvol verwijderd');
        }

        return redirect()->route('customers.show', $customer)->with('message', 'Het klant contact kon niet worden verwijderd');
    }
}
