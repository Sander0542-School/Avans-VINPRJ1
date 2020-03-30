@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Klant toevoegen</h4>
                        <a href="{{ route('customers.create') }}" class="btn btn-primary">Openen</a>
                    </div>
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Klanten</h1>
                <table class="table table-striped table-hover" id="customers">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Openen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($customers != null)
                        @foreach ($customers as $customer)
                            <tr>
                                <th scope="row">{{ $customer->id }}</th>
                                <td>{{ $customer->name }}</td>
                                <td><a href="{{ route('customers.show', $customer) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">Er zijn geen klanten gevonden</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                <div class="d-flex">
                    <div class="mx-auto">
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
