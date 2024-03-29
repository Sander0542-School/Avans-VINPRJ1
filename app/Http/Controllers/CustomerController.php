<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('name')->paginate(25);
        
        return view('pages.customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $customer = Customer::create($data);

        if ($customer->exists) {
            return redirect()->route('customers.show', $customer)->with('message', 'De klant is toegevoegd');
        }

        return redirect()->back()->with('message', 'De klant kon niet worden toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('pages.customers.show')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        if ($customer->update($data)) {
            return redirect()->route('customers.show', $customer)->with('message', 'De gegevens van de klant zijn bewerkt');
        }

        return redirect()->back()->with('message', 'De gegevens van de klant konden niet worden bewerkt');
    }
}
