@extends('layouts.app', ['title' => __('Leveranciers')])

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="row">
                <div class="col-12">

                    <h1 class="text-center">Leverancier voor {{ $supplierProducts->first()->product->name }}</h1>
                    <table class="table table-striped table-hover" id="products">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Leverancier id</th>
                                <th scope="col">Leverancier naam</th>
                                <th scope="col">Product prijs</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($supplierProducts)
                            @foreach ($supplierProducts as $products)
                                <tr>
                                    <th scope="row">{{ $products->supplier->id }}</th>
                                    <th scope="row">{{ $products->supplier->name }}</th>
                                    <th scope="row">@money($products->price)</th>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">Er zijn geen leveranciers voor dit product.</td>
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
    </div>
@endsection
