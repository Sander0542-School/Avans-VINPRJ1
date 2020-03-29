@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($orders as $order)
            <h2><a href="{{ route('orders.show', $order) }}">Order {{ $order->id }}</a></h2>
            <h3><a href="{{ route('customers.show', $order->customer) }}">{{ $order->customer->name }}</a></h3>
            <p>@date($order->date)</p>
            <div class="row">
                @foreach($order->order_containers as $container)
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <span class="card-title">{{ $container->containercode }}</span>
                            </div>
                        </div>
                        <br/>
                    </div>
                @endforeach
            </div>
            <hr/>
        @endforeach

        <div class="d-flex">
            <div class="mx-auto">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
