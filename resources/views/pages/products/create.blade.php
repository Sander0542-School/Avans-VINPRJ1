@extends('layouts.app', ['title' => __('Product Aanmaken')])

@section('content')
    <div class="container">
        <div class="col-12">
            <form method="POST" action="{{ route('products.store') }}">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            Nieuw product
                        </h4>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="productName">Naam</label>
                                <input type="text" class="form-control" name="productName" id="productName">
                            </div>
                            <div class="form-group col-4">
                                <label for="productOrderCode">Bestelcode</label>
                                <input type="text" class="form-control" name="productOrderCode" id="productOrderCode">
                            </div>
                            <div class="form-group col-4">
                                <label for="productPrice">Prijs</label>
                                <input type="number" class="form-control" name="productPrice" id="productPrice">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection