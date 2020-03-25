@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Update address</h4>
                            <label for="addressStreet">Straat</label>
                            <input type="text" name="name" class="form-control" id="addressStreet" value="{{$address->street}}">
                            <label for="addressNumber">huis nummer</label>
                            <input type="text" name="name" class="form-control" id="addressNumber" value="{{$address->number}}">
                            <label for="addressCountry">Land</label>
                            <input type="text" name="name" class="form-control" id="addressCountry" value="{{$address->country}}">

                            <div class="form-row">
                                <div class="form-group col-5">
                                    <label for="addressCity">Stad</label>
                                    <input type="text" class="form-control" id="addressCity" value="{{$address->city}}">
                                </div>
                                <div class="form-group col-4">
                                    <label for="addressState">Provincie</label>
                                    <input type="text" class="form-control" id="addressState" value="{{$address->state}}">
                                </div>
                                <div class="form-group col-3">
                                    <label for="addressZip">Postcode</label>
                                    <input type="text" class="form-control" id="addressZip" value="{{$address->zipcode}}">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info mt-2" value="opslaan"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection