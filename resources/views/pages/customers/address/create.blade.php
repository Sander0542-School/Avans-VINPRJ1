@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{ route('customers.address.store', $customer) }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Adres toevoegen</h4>
                            <label for="addressStreet">Straat</label>
                            <input type="text" name="street" class="form-control" id="addressStreet">
                            <label for="addressNumber">Huisnummer</label>
                            <input type="number" name="number" class="form-control" id="addressNumber">
                            <label for="addressCountry">Land</label>
                            <input type="text" name="country" class="form-control" id="addressCountry">

                            <div class="form-row">
                                <div class="form-group col-5">
                                    <label for="addressCity">Stad</label>
                                    <input type="text" name="city" class="form-control" id="addressCity">
                                </div>
                                <div class="form-group col-4">
                                    <label for="addressState">Provincie</label>
                                    <input type="text" name="state" class="form-control" id="addressState">
                                </div>
                                <div class="form-group col-3">
                                    <label for="addressZip">Postcode</label>
                                    <input type="text" name="zipcode" class="form-control" id="addressZip">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info mt-2" value="Toevoegen"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
