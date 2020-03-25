@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Update contact</h4>
                            <label for="contactName">Contact naam</label>
                            <input type="text" name="name" class="form-control" id="contactName" value="{{$contact->name}}">
                            <label for="contactEmail">Contact email</label>
                            <input type="text" name="name" class="form-control" id="contactEmail" value="{{$contact->email}}">
                            <label for="contactPhone">Contact telefoon nummer</label>
                            <input type="text" name="name" class="form-control" id="contactPhone" value="{{$contact->phone}}">
                            <label for="contactTitle">Contact werk titel</label>
                            <input type="text" name="name" class="form-control" id="contactTitle" value="{{$contact->jobtitle}}">
    
                            <input type="submit" class="btn btn-info mt-2" value="opslaan"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection