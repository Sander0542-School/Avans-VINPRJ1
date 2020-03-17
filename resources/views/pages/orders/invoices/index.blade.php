@extends('layouts.app', ['title' => 'Order Invoices'])

@section('content')
    <div class="container">
        <h1 class="text-center">Order Invoices</h1>
        <table class="table table-striped table-hover" id="invoices">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Order</th>
                <th scope="col">Customer</th>
                <th scope="col">Total price</th>
                <th scope="col">Paid?</th>
            </tr>
            </thead>
            <tbody>
            @if ($invoices != null)
                @foreach ($invoices as $invoice)
                    <tr class="clickable" onclick="">
                        <th scope="row">{{ $invoice->order->id }}</th>
                        <td>{{ $invoice->order->customer->name }}</td>
                        <td>&euro; NULL</td>
                        @if ($invoice->paid)
                            <td class="text-success">Yes</td>
                        @else
                            <td class="text-danger">No</td>
                        @endif
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">There are no order with an invoice available!</td>
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

