@extends('layouts.app', ['title' => __('Product wijzigen')])

@section('content')
    <div class="container">
        <div class="col-12">
            <form method="POST" action="{{ route('products.update', $product) }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            Product wijzigen - {{ $product->name }}
                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i></button>
                        </h4>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="productName">Naam</label>
                                <input type="text" class="form-control" name="name" id="productName" value="{{ $product->name }}">
                            </div>
                            <div class="form-group col-4">
                                <label for="productOrderCode">Bestelcode</label>
                                <input type="text" class="form-control" name="ordercode" id="productOrderCode" value="{{ $product->ordercode }}">
                            </div>
                            <div class="form-group col-4">
                                <label for="productPrice">Prijs</label>
                                <input type="number" class="form-control" name="price" id="productPrice" value="{{ $product->price }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="productLocation">Locatie</label>
                                <input type="text" class="form-control" name="location" id="productLocation" value="{{ $product->location }}">
                            </div>
                            <div class="form-group col-4">
                                <label for="productStock">Voorraad</label>
                                <input type="number" class="form-control" name="stock" id="productStock" value="{{ $product->stock }}" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="productMinStock">Minimum voorraad</label>
                                <input type="number" class="form-control" name="minimum_stock" id="productMinStock" value="{{ $product->minimum_stock }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="productActiveSubstances">Actieve stoffen</label>
                                <input type="text" class="form-control" name="active_substances" id="productActiveSubstances" value="{{ $product->active_substances }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="productShortDescription">Lange beschrijving</label>
                                <textarea type="text" class="form-control" name="short_description" id="productShortDescription" rows="2">{{ $product->short_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="productLongDescription">Korte beschrijving</label>
                                <textarea type="text" class="form-control" name="long_description" id="productLongDescription" rows="3">{{ $product->long_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="productOrderQuantity">Bestel hoeveelheid</label>
                                <input type="number" class="form-control" name="order_quantity" id="productOrderQuantity" value="{{ $product->order_quantity }}">
                            </div>
                            <div class="form-group col-4">
                                <label for="productPackagingLength">Verpakking lengte</label>
                                <input type="number" class="form-control" name="packaging_length" id="productPackagingLength" value="{{ $product->packaging_length }}">
                            </div>
                            <div class="form-group col-4">
                                <label for="productPackagingWidth">Verpakking breedte</label>
                                <input type="number" class="form-control" name="packaging_width" id="productPackagingWidth" value="{{ $product->packaging_width }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="productPackagingHeight">Verpakking hoogte</label>
                                <input type="number" class="form-control" name="packaging_height" id="productPackagingHeight" value="{{ $product->packaging_height }}">
                            </div>
                            <div class="form-group col-4">
                                <label for="productConsumerPackages">Producten per verpakking</label>
                                <input type="number" class="form-control" name="consumer_packages" id="productConsumerPackages" value="{{ $product->consumer_packages }}">
                            </div>
                            <div class="form-group col-4">
                                <label for="productPackagingType">Verpakking type</label>
                                <input type="text" class="form-control" name="packaging_type" id="productPackagingType" value="{{ $product->packaging_type }}">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection