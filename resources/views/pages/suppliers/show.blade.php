@extends('layouts.app', ['title' => __('Leverancier')])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form method="POST" action="{{ route('suppliers.update', $supplier) }}">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Leverancier</h4>

                            <div class="form-group">
                                <label for="customerName">Naam</label>
                                <input type="text" name="name" class="form-control" id="customerName" value="{{ $supplier->name }}">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-9">
                                    <label for="addressStreet">Straat</label>
                                    <input type="text" name="street" class="form-control" id="addressCity" value="{{ $supplier->street }}">
                                </div>
                                <div class="form-group col-3">
                                    <label for="addressNumber">Huisnummer</label>
                                    <input type="text" name="number" class="form-control" id="addressNumber" value="{{ $supplier->number }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-5">
                                    <label for="addressCity">Stad</label>
                                    <input type="text" name="city" class="form-control" id="addressCity" value="{{ $supplier->city }}">
                                </div>
                                <div class="form-group col-4">
                                    <label for="addressState">Provincie</label>
                                    <input type="text" name="state" class="form-control" id="addressState" value="{{ $supplier->state }}">
                                </div>
                                <div class="form-group col-3">
                                    <label for="addressZip">Postcode</label>
                                    <input type="text" name="zipcode" class="form-control" id="addressZip" value="{{ $supplier->zipcode }}">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info" value="Opslaan">
                        </div>
                    </div>
                    <br/>
                </form>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bestellingen</h4>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Prijs</th>
                                <th scope="col">Aantal</th>
                                <th scope="col">Datum</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($supplier->supplier_orders()->orderByDesc('date')->paginate(25) as $order)
                                <tr>
                                    <td>{{ $order->product->name }}</td>
                                    <td>@money($order->price)</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>@date($order->date)</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br/>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Contacten</h4>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Naam</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefoon</th>
                                <th scope="col">Functietitel</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($supplier->supplier_contacts()->orderBy('name')->get() as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->jobtitle }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
