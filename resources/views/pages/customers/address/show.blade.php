@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                {{dump($customerAddress)}}
            </div>
        </div>
    </div>
@endsection