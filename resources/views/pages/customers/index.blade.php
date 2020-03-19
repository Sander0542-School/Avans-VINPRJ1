@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gebruiker aanmaken</h4>
                        <a href="{{ route('customers.create') }}" class="btn btn-primary">Openen</a>
                    </div>
                </div>
            </div>
        </div>

        <hr />

        <div class="row text-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Selecteer bestaande klant</h4>

                        <div class="form-group">
                            <select class="form-control selectpicker" id="customer_id" name="customer_id" data-live-search="true" onchange="customerSelected(this.value)" title="Kies een klant" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
