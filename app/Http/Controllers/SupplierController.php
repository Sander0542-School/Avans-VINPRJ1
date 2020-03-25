<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $suppliers = Supplier::paginate();

        return view('pages.suppliers.index')->with('suppliers', $suppliers);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Supplier $supplier)
    {
        return view('pages.suppliers.show')->with('supplier', $supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:11', 'regex:/[0-9]+[a-z]*?$/'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zipcode' => ['required', 'string', 'max:255', 'regex:/[0-9]{4}\s?[A-Z]{2}$/'],
        ]);

        if ($supplier->update($data)) {
            return redirect()->back()->with('message', 'De gegevens van de leverancier zijn bewerkt');
        }

        return redirect()->back()->with('message', 'De gegevens van de leverancier konden niet worden bewerkt');
    }
}
