@extends('layouts.app', ['title' => 'Facturen'])

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-4 offset-2">
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
                        <h4 class="card-title">Bestellingen weergeven</h4>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Openen</a>
                    </div>
                </div>
            </div>
        </div>

        <hr />

        <h1 class="text-center">Facturen</h1>
        <table class="table table-striped table-hover" id="invoices">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Bestelling</th>
                <th scope="col">Klant</th>
                <th scope="col">Totaalprijs</th>
                <th scope="col">Betaald?</th>
                <th scope="col">Openen</th>
            </tr>
            </thead>
            <tbody>
            @if ($invoices != null)
                @foreach ($invoices as $invoice)
                    <tr>
                        <th scope="row">{{ $invoice->order->id }}</th>
                        <td>{{ $invoice->order->customer->name }}</td>
                        <td>@money($invoice->order->total)</td>
                        @if ($invoice->paid)
                            <td class="text-success">Ja</td>
                        @else
                            <td class="text-danger">Nee</td>
                        @endif
                        <td><a href="{{ route('orders.show', $invoice->order) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">Er zijn geen facturen beschikbaar!</td>
                </tr>
            @endif
            </tbody>
        </table>

        <div class="d-flex">
            <div class="mx-auto">
                {{ $invoices->links() }}
            </div>
        </div>
    </div>
@endsection

