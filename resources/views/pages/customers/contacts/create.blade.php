@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1>Create new contacts</h1>
                <form method="POST" action="{{ route('customers.contacts.store', $customer) }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Contacten</h4>
                            <label for="name">Contact naam</label>
                            <input type="text" name="contactName" class="form-control" id="contactName">
                            <label for="email">Contact email</label>
                            <input type="text" name="contactEmail" class="form-control" id="contactEmail">
                            <label for="phone">Contact telefoon nummer</label>
                            <input type="text" name="contactPhone" class="form-control" id="contactPhone">
                            <label for="jobtitle">Contact werk titel</label>
                            <input type="text" name="contactTitle" class="form-control" id="contactTitle">
    
                            <input type="submit" class="btn btn-info mt-2" value="aanmaken"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection