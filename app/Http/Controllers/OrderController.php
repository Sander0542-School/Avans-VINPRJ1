<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $customers = Customer::all();

        return view('pages.orders.create')->with('customers', $customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => ['required', 'integer', 'exists:customers,id'],
            'customer_address_id' => ['required', 'integer', 'exists:customer_addresses,id'],
        ]);

        $data = array_merge($data, [
            'date' => now(),
            'status' => 'processing',
        ]);

        $order = Order::create($data);

        if ($order->exists) {
            return redirect()->route('orders.show', $order)->with('message', 'Bestelling aangemaakt');
        }

        return redirect()->back()->with('message', 'De bestelling kon niet worden aanmaken');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        $products = Product::whereNotIn('id', $order->products->pluck('id'))->get();

        return view('pages.orders.show')->with('order', $order)->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeProduct(Request $request, Order $order)
    {
        if ($order->hasInvoice()) {
            return redirect()->back()
                ->with('message', 'De order heeft al een factuur en mag niet meer worden aangepast');
        }

        $data = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['required', 'integer'],
        ]);

        $product = Product::whereId($data['product_id'])->first();

        if ($data['quantity'] < $product->order_quantity) {
            return redirect()->back()
                ->with('message', '"'.$product->name.'" is moet minimaal '.$product->order_quantity.' keer besteld worden');
        }

        $data = array_merge($data, [
            'order_id' => $order->id,
            'price' => $product->price,
        ]);

        $orderProduct = OrderProduct::create($data);

        if ($orderProduct->exists) {
            return redirect()->route('orders.show', $order)
                ->with('message', '"'.$product->name.'" is toegevoegd aan de bestelling');
        }

        return redirect()->back()->with('message', 'Het product kon niet aan de bestelling worden toegevoegd');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProduct(Request $request, Order $order, Product $product)
    {
        if ($order->hasInvoice()) {
            return redirect()->back()
                ->with('message', 'De order heeft al een factuur en mag niet meer worden aangepast');
        }

        $data = $request->validate([
            'quantity' => ['required', 'integer'],
        ]);

        $orderProduct = OrderProduct::whereOrderId($order->id)->whereProductId($product->id)->first();

        if ($data['quantity'] < $product->order_quantity) {
            return redirect()->back()
                ->with('message', '"'.$product->name.'" is moet minimaal '.$product->order_quantity.' keer besteld worden');
        }

        if ($orderProduct != null) {
            if ($orderProduct->update($data)) {
                return redirect()->route('orders.show', $order)
                    ->with('message', 'Het aantal van "'.$product->name.'" is aangepast naar '.$orderProduct->quantity);
            }
        }

        return redirect()->back()->with('message', 'Het aantal van "'.$product->name.'" kon niet worden bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Order $order)
    {
        if (! $order->hasInvoice()) {
            if ($order->delete()) {
                return redirect()->route('orders.index')->with('message', 'De bestelling is succesvol verwijderd');
            }
        }

        return redirect()->back()->with('message', 'De bestelling kon niet worden verwijderd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroyProduct(Order $order, Product $product)
    {
        if ($order->hasInvoice()) {
            return redirect()->back()
                ->with('message', 'De order heeft al een factuur en mag niet meer worden aangepast');
        }

        $orderProduct = OrderProduct::whereOrderId($order->id)->whereProductId($product->id)->first();

        if ($orderProduct != null) {
            if ($orderProduct->delete()) {
                return redirect()->route('orders.show', $order)
                    ->with('message', '"'.$product->name.'" is van de order verwijderd');
            }
        }

        return redirect()->back()->with('message', '"'.$product->name.'" kon niet van de bestelling verwijderd worden');
    }
}
