<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAddStock;
use App\Http\Requests\UpdateProduct;
use App\Models\Product;
use App\Models\SupplierOrder;
use App\Models\SupplierProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name')->orderBy('price')->paginate(25);
        return view('pages.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateProduct  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, Product $product)
    {
        if ($product->update($request->validated())) {
            return redirect()->route('products.show', $product->id)->with('message', 'Het product is geüpdate');
        }
    }

    /**
     * Get all suppliers for a product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productSuppliers(Product $product)
    {
        if (SupplierProduct::where('product_id', $product->id)->exists())
        {
            $supplierProducts = SupplierProduct::where('product_id', $product->id)->orderBy('price')->paginate('25');
            return view('pages.products.suppliers.index')->with('supplierProducts', $supplierProducts);
        }
        else
        {
            return redirect()->back()->with('message', 'Het product is niet gekoppeld aan een leverancier');
        }
    }

    /**
     * Add value to stock via specified supplier.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function addStock(ProductAddStock $request, Product $product)
    {
        //needed parsing because of american to european price difference
        $parsedPrice = floatval(
                        str_replace('€', '',
                            str_replace(',', '.',
                                str_replace('.', ',', $request->input('productPrice')))));

        $supplierOrder = new SupplierOrder();
        $supplierOrder->supplier_id = $request->input('supplierId');
        $supplierOrder->product_id = $request->input('productId');
        $supplierOrder->quantity = $request->input('productCount');
        $supplierOrder->price = $parsedPrice;
        $supplierOrder->date = Carbon::now()->toDate();
        $supplierOrder->save();

        $product->stock += $request->input('productCount');
        $product->save();

        return redirect()->route('products.show', $product->id)->with('message', $supplierOrder->amount . ' producten toegevoegd.');
    }
}
