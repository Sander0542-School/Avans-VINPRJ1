@extends('layouts.app', ['title' => __('Bestellingen')])

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-4 offset-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bestellingen aanmaken</h4>
                        <a href="{{ route('orders.create') }}" class="btn btn-primary">Openen</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Facturen weergeven</h4>
                        <a href="{{ route('orders.invoicing') }}" class="btn btn-primary">Openen</a>
                    </div>
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Bestellingen</h1>
                <table class="table table-striped table-hover" id="orders">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Bestelling</th>
                        <th scope="col">Klant</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Totaalprijs</th>
                        <th scope="col">Openen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($orders != null)
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->customer->name }}</td>
                                <td>@date($order->date)</td>
                                <td>@money($order->total)</td>
                                <td><a href="{{ route('orders.show', $order) }}" class="btn btn-primary"><i class="fas fa-play"></i></a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">Er zijn geen bestellingen beschikbaar!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                <div class="d-flex">
                    <div class="mx-auto">
                        {{ $orders->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
