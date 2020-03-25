@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1>Contact toevoegen</h1>
                <form method="POST" action="{{ route('customers.contacts.store', $customer) }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Contacten</h4>
                            <label for="name">Naam</label>
                            <input type="text" name="name" class="form-control" id="contactName">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="contactEmail">
                            <label for="phone">Telefoon</label>
                            <input type="text" name="phone" class="form-control" id="contactPhone">
                            <label for="jobtitle">Functietitel</label>
                            <input type="text" name="jobtitle" class="form-control" id="contactTitle">
    
                            <input type="submit" class="btn btn-info mt-2" value="Toevoegen"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
