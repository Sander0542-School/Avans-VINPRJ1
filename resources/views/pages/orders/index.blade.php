@extends('layouts.app', ['title' => __('Orders')])

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order aanmaken</h4>
                        <a href="{{ route('orders.create') }}" class="btn btn-primary">Openen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
