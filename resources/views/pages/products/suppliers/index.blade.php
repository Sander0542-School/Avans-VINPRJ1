@extends('layouts.app', ['title' => __('Leveranciers')])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Leverancier voor {{ $supplierProducts->first()->product->name }}</h4>
                        <table class="table table-striped table-hover" id="products">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Leverancier id</th>
                                <th scope="col">Leverancier naam</th>
                                <th scope="col">Product prijs</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($supplierProducts)
                                @foreach ($supplierProducts as $products)
                                    <tr id="{{ $products->supplier->id }}">
                                        <td scope="row"><input type="checkbox"></td>
                                        <td scope="row" id="tableSupplierId">{{ $products->supplier->id }}</td>
                                        <td scope="row" id="tableSupplierName">{{ $products->supplier->name }}</td>
                                        <td scope="row" id="tableProductPrice">@money($products->price)</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Er zijn geen leveranciers voor dit product.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                        <div class="d-flex">
                            <div class="mx-auto">
                                {{ $supplierProducts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bijbestellen</h4>
                        <form action="{{ route('products.addStock', $supplierProducts->first()->product) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Leverancier naam</label>
                                <input class="form-control" type="text" id="supplierName" disabled/>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="">ProductID</label>
                                    <input class="form-control" type="number" id="productId" name="productId" value="{{ $supplierProducts->first()->product->id }}" readonly/>
                                </div>
                                <div class="form-group col-4">
                                    <label for="">LeverancierID</label>
                                    <input class="form-control" type="number" id="supplierId" name="supplierId" readonly/>
                                </div>
                                <div class="form-group col-4">
                                    <label for="">Prijs</label>
                                    <input class="form-control" type="text" id="productPrice" name="productPrice" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Bestel aantal</label>
                                <input class="form-control" type="number" id="productCount" name="productCount" value="{{ old('productCount') }}"/>
                            </div>
                            <button class="btn btn-success" type="submit">Bestellen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $( document ).ready(function() {
            $("input[type='checkbox']").change(function () {
                $("input[type='checkbox']").each(function() {
                    this.checked = false;
                });
                $(this).prop('checked', true);
                let supplierName = $(this).closest('tr').find('#tableSupplierName', 'td').html().replace("&amp;", "&");
                let supplierId = $(this).closest('tr').find('#tableSupplierId', 'td').html();
                let productPrice = $(this).closest('tr').find('#tableProductPrice', 'td').html();
                $(document).find('#supplierName').attr('value', supplierName);
                $(document).find('#supplierId').attr('value', supplierId);
                $(document).find('#productPrice').attr('value', productPrice);
            });
        });
    </script>
@endpush
