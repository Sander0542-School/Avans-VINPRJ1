@extends('layouts.app', ['title' => __('Bestelling Bewerken')])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Klantgegevens</h4>
                        <div class="form-group">
                            <label for="customerName">Naam</label>
                            <input type="text" class="form-control" id="customerName" value="{{ $order->customer->name }}" disabled>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-9">
                                <label for="addressStreet">Street</label>
                                <input type="text" class="form-control" id="addressCity" value="{{ $order->customer_address->street }}" disabled>
                            </div>
                            <div class="form-group col-3">
                                <label for="addressNumber">Number</label>
                                <input type="number" class="form-control" id="addressZip" value="{{ $order->customer_address->number }}" disabled>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-5">
                                <label for="addressCity">Stad</label>
                                <input type="text" class="form-control" id="addressCity" value="{{ $order->customer_address->city }}" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="addressState">Provincie</label>
                                <input type="text" class="form-control" id="addressState" value="{{ $order->customer_address->state }}" disabled>
                            </div>
                            <div class="form-group col-3">
                                <label for="addressZip">Postcode</label>
                                <input type="text" class="form-control" id="addressZip" value="{{ $order->customer_address->zipcode }}" disabled>
                            </div>
                        </div>

                        @if (!$order->hasInvoice())
                            <form method="POST" action="{{ route('orders.destroy', $order) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Bestelling Verwijderen">
                            </form>
                        @endif
                    </div>
                </div>
                <br/>

                @if (!$order->hasInvoice())
                    <form method="POST" action="{{ route('orders.products.store', $order) }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Product Toevoegen</h4>
                                <div class="form-group">
                                    <label for="product">Product</label>
                                    <select class="form-control selectpicker" id="product" name="product_id" data-live-search="true" title="Kies een product" onchange="productSelected(this.value)">
                                        <option disabled selected>Kies een product</option>
                                        @foreach($products as $product)
                                            <option id="product{{ $product->id }}" value="{{ $product->id }}" data-price="{{ $product->price }}" data-stock="{{ $product->stock }}" data-order-quantity="{{ $product->order_quantity }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="addressCity">Prijs</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">&euro;</div>
                                            </div>
                                            <input type="text" class="form-control" id="productPrice" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="addressState">Aantal</label>
                                        <input type="number" class="form-control" id="productAmount" name="quantity" value="0">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="addressCity">Voorraad</label>
                                        <input type="number" class="form-control" id="productStock" disabled>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="addressCity">Minimaal Aantal</label>
                                        <input type="number" class="form-control" id="productOrderQuantity" disabled>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-success" value="Toevoegen"/>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Factuur</h4>
                            @if($order->order_invoice->paid)
                                <p class="text-success">Deze factuur is reeds betaald!</p>
                            @else
                                <p class="text-danger">Deze factuur is nog niet betaald!</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Producten</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Stukprijs</th>
                                <th width="20%">Aantal</th>
                                <th>Totaalprijs</th>
                                @if (!$order->hasInvoice())
                                    <th width="10%"></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @if($order->products->count() > 0)
                                @foreach($order->products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td class="text-right">@money($product->pivot->price)</td>
                                        @if ($order->hasInvoice())
                                            <td>{{ $product->pivot->quantity }}</td>
                                        @else
                                            <td>
                                                <form method="POST" action="{{ route('orders.products.update', [$order, $product]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group" style="margin: 0">
                                                        <input type="number" class="form-control" name="quantity" value="{{ $product->pivot->quantity }}">
                                                    </div>
                                                </form>
                                            </td>
                                        @endif
                                        <td class="text-right">@money($product->pivot->price * $product->pivot->quantity)</td>
                                        @if (!$order->hasInvoice())
                                            <td>
                                                <form method="POST" action="{{ route('orders.products.destroy', [$order, $product]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger" value="&times;">
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Deze bestelling heeft geen producten</td>
                                </tr>
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="2">Subtotaal</th>
                                <td colspan="2" class="text-right">@money($order->subtotal)</td>
                                @if(!$order->hasInvoice())
                                    <td></td>
                                @endif

                            </tr>
                            <tr>
                                <th colspan="2">Korting</th>
                                <td colspan="2" class="text-right">{{ $order->discount }}%</td>
                                @if(!$order->hasInvoice())
                                    <td></td>
                                @endif
                            </tr>
                            <tr>
                                <th colspan="2">Klantkorting</th>
                                <td colspan="2" class="text-right">{{ $order->customer_discount }}%</td>
                                @if(!$order->hasInvoice())
                                    <td></td>
                                @endif
                            </tr>
                            <tr>
                                <th colspan="2">Totaal</th>
                                <td colspan="2" class="text-right">@money($order->total)</td>
                                @if(!$order->hasInvoice())
                                    <td></td>
                                @endif
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function productSelected(productId) {
            const product = $('#product' + productId);

            $('#productPrice').val(product.data('price'));
            $('#productStock').val(product.data('stock'));
            $('#productOrderQuantity').val(product.data('order-quantity'));
        }
    </script>
@endpush
