@extends('layouts.app', ['title' => __('Link product')])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Link een product aan een leverancier</h5>
                        <div class="form-group">
                            <select class="form-control selectpicker" id="supplier" name="supplier_id" data-live-search="true" title="Kies een leverancier" onchange="supplierSelected(this.value)">
                                <option disabled selected>Kies een leverancier</option>
                                @foreach($suppliers as $supplier)
                                    <option id="supplier{{ $supplier->id }}" value="{{ $supplier->id }}" data-price="{{ $product->price }}" data-product="{{ $product->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <form action="{{ route('products.linkSupplier', $product) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="supplierId">Leverancier Id</label>
                                <input type="number" name="supplier_id" id="supplierId" class="form-control" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="productId">Product Id</label>
                                <input type="number" name="product_id" id="productId" class="form-control" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product prijs</label>
                                <input type="number" name="price" id="productPrice" class="form-control" readonly/>
                            </div>
                            <a class="btn btn-danger" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"> Terug</i></a>
                            <button class="btn btn-success"><i class="fa fa-save"> Koppelen</i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function supplierSelected(supplierId) {
            const product = $('#supplier' + supplierId);

            $('#supplierId').attr('value', supplierId);
            $('#productId').attr('value', product.data('product'));
            $('#productPrice').attr('value', product.data('price'));
        }
    </script>
@endpush