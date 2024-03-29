@extends('layouts.app', ['title' => __('Producten')])

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-4 offset-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Producten aanmaken</h4>
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Openen</a>
                    </div>
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Producten</h1>
                <table class="table table-striped table-hover" id="products">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Bestelcode</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Prijs</th>
                        <th scope="col">Voorraad</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($products)
                        @foreach ($products as $product)
                            <tr class="clickable" onclick="window.location.href = '{{ route('products.show', $product) }}'">
                                <th scope="row">{{ $product->ordercode }}</th>
                                <th scope="row">{{ $product->name }}</th>
                                <th scope="row">@money($product->price)</th>
                                <th scope="row" class="text-{{ $product->stock < $product->minimum_stock ? 'danger' : 'default' }}">{{ $product->stock }}</th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">Er zijn geen producten gevonden</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                <div class="d-flex">
                    <div class="mx-auto">
                        {{ $products->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
