@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-8 offset-2">
                <h1>Bedrijf `Bedrijf naam`</h1>
                <input type="text" class="form-control" id="bNaam">
                <input type="submit" class="btn btn-info mt-2" value="opslaan"/>
            </div>
        </div>
        
        <hr />

        <div class="row text-center">
            <div class="col-6">
                <div class="form-group">
                    <label for="customer_id">Adressen</label>
                    {{-- <select class="form-control selectpicker" id="customer_id" name="customer_id" data-live-search="true" onchange="customerSelected(this.value)" title="Kies een klant" required>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select> --}}
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="customer_id">Contacten</label>
                    {{-- <select class="form-control selectpicker" id="customer_id" name="customer_id" data-live-search="true" onchange="customerSelected(this.value)" title="Kies een klant" required>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
