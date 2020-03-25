@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Klant toevoegen</h4>
                            <label for="addressCity">Naam</label>
                            <input type="text" name="name" class="form-control" id="bedrijf_naam">
    
                            <input type="submit" class="btn btn-info mt-2" value="aanmaken"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
