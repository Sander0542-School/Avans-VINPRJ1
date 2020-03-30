@extends('layouts.app', ['title' => __('Bestellingen')])

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bestellingen aanmaken</h4>
                        <a href="{{ route('orders.create') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Openen</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Facturen weergeven</h4>
                        <a href="{{ route('orders.invoices') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Openen</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Magazijn overzicht</h4>
                        <a href="{{ route('orders.warehouse') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Openen</a>
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
                    </tr>
                    </thead>
                    <tbody>
                    @if ($orders != null)
                        @foreach ($orders as $order)
                            <tr class="clickable" onclick="window.location.href = '{{ route('orders.show', $order) }}'">
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->customer->name }}</td>
                                <td>@date($order->date)</td>
                                <td>@money($order->total)</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">Er zijn geen bestellingen gevonden</td>
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
