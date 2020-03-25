@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-8 offset-2">
                <form method="POST" action="{{ route('customers.update', $customer) }}">
                    @csrf
                    @method('PUT')
                    <h1>Bedrijf {{ $customer->name }}</h1>
                    <input type="text" name="name" class="form-control" value="{{ $customer->name }}" id="bedrijf_naam">
                    <input type="submit" class="btn btn-info mt-2" value="opslaan"/>
                </form>
            </div>
        </div>
        
        <hr />

        <div class="row">
            <div class="col-6">
                <h2 class="text-center">Adressen <a href="{{ route('customers.address.create', $customer) }}" class="btn btn-primary">Maak nieuwe</a></h2> 
                <table class="table table-striped table-hover" id="customers">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Huisnummer</th>
                        <th scope="col">Stad</th>
                        <th scope="col">Land</th>
                        <th scope="col">Openen</th>
                        <th scope="col">Verwijderen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($customer->customer_addresses != null)
                        @foreach ($customer->customer_addresses as $address)
                            <tr>
                                <th scope="row">{{ $address->id }}</th>
                                <td>{{ $address->number }}</td>
                                <td>{{ $address->city }}</td>
                                <td>{{ $address->country }}</td>
                                <td><a href="{{ route('customers.address.show', [$customer, $address]) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                <td>
                                    <form method="POST" action="{{ route('customers.address.destroy', [$customer, $address]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">Er zijn geen adressen voor deze klant gevonden</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <h2 class="text-center">Klant contacten <a href="{{ route('customers.contacts.create', $customer) }}" class="btn btn-primary">Maak nieuwe</a></h2>
                <table class="table table-striped table-hover" id="customers">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Openen</th>
                        <th scope="col">Verwijderen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($customer->customer_addresses)
                        @foreach ($customer->customer_contacts as $contact)
                            <tr>
                                <th scope="row">{{ $contact->id }}</th>
                                <td>{{ $contact->name }}</td>
                                <td><a href="{{ route('customers.contacts.show', [$customer, $contact]) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                <td>
                                    <form method="POST" action="{{ route('customers.contacts.destroy', [$customer, $contact]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">Er zijn geen klant adressen</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
