@extends('layouts.app', ['title' => __('Product details')])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product voorraad</h4>
                        <div class="form-group">
                            <label for="productStock">Huidige voorraad</label>
                            <input type="text" class="form-control text-{{ $product->stock < $product->minimum_stock ? 'danger' : 'default' }}" id="productStock" value="{{ $product->stock }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="productMinStock">Gewenste voorraad</label>
                            <input type="text" class="form-control" id="productMinStock" value="{{ $product->minimum_stock }}" disabled>
                        </div>
                        @if($product->hasSupplier())
                            <a class="btn btn-primary" href="{{ route('products.suppliers', $product) }}">Product bijbestellen</a>
                        @else
                            <a class="btn btn-primary" href="{{ route('products.link', $product) }}">Product koppelen</a>
                        @endif
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product verpakking</h4>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="productPackagingLength">Verpakking lengte</label>
                                <input type="text" class="form-control" id="productPackagingLength" value="@centimeter($product->packaging_length)" disabled>
                            </div>
                            <div class="form-group col-6">
                                <label for="productPackagingWidth">Verpakking breedte</label>
                                <input type="text" class="form-control" id="productPackagingWidth" value="@centimeter($product->packaging_width)" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="productPackagingHeight">Verpakking hoogte</label>
                                <input type="text" class="form-control" id="productPackagingHeight" value="@centimeter($product->packaging_height)" disabled>
                            </div>
                            <div class="form-group col-6">
                                <label for="productPackagingType">Verpakking type</label>
                                <input type="text" class="form-control" id="productPackagingType" value="{{ $product->packaging_type }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product gegevens <a href="{{ route('products.edit', $product) }}" class="btn btn-warning pull-right"><i class="fa fa-pencil"></i></a></h4>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="productName">Naam</label>
                                <input type="text" class="form-control" id="productName" value="{{ $product->name }}" disabled>
                            </div>
                            <div class="form-group col-6">
                                <label for="productOrderCode">Bestelcode</label>
                                <input type="number" class="form-control" id="productOrderCode" value="{{ $product->ordercode }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="productPrice">Prijs</label>
                                <input type="text" class="form-control" id="productPrice" value="@money($product->price)" disabled>
                            </div>
                            <div class="form-group col-6">
                                <label for="productLocation">Locatie</label>
                                <input type="text" class="form-control" id="productLocation" value="{{ $product->location }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productShortDescription">Korte Beschrijving</label>
                            <textarea class="form-control" id="productShortDescription" rows="3" disabled>{{ $product->short_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="productLongDescription">Lange Beschrijving</label>
                            <textarea class="form-control" id="productLongDescription" rows="4" disabled>{{ $product->long_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="productActiveSubstances">Actieve stoffen</label>
                            <input type="text" class="form-control" id="productActiveSubstances" value="{{ $product->active_substances }}" disabled>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="productOrderQuantity">Bestelhoeveelheid</label>
                                <input type="text" class="form-control" id="productOrderQuantity" value="{{ $product->order_quantity }}" disabled>
                            </div>
                            <div class="form-group col-6">
                                <label for="productLocation">Klant verpakkingen</label>
                                <input type="number" class="form-control" id="productLocation" value="{{ $product->consumer_packages }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection