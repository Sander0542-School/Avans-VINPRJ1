@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1>Create new contacts</h1>
                <form method="POST" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Contacten</h4>
                            <label for="contactName">Contact naam</label>
                            <input type="text" name="name" class="form-control" id="contactName">
                            <label for="contactEmail">Contact email</label>
                            <input type="text" name="name" class="form-control" id="contactEmail">
                            <label for="contactPhone">Contact telefoon nummer</label>
                            <input type="text" name="name" class="form-control" id="contactPhone">
                            <label for="contactTitle">Contact werk titel</label>
                            <input type="text" name="name" class="form-control" id="contactTitle">
    
                            <input type="submit" class="btn btn-info mt-2" value="aanmaken"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection