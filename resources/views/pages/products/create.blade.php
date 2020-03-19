@extends('layouts.app', ['title' => __('Product Aanmaken')])

@section('content')
    <div class="container">
        <div class="col-8 offset-2">
            <form method="POST" action="{{ route('products.store') }}">
                <h5>nieuw product</h5>
            </form>
        </div>
    </div>
@endsection