@extends('layouts.app', ['title' => __('Leveranciers')])

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Leverancier toevoegen</h4>
                        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Openen</a>
                    </div>
                </div>
            </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Leveranciers</h1>
                <table class="table table-striped table-hover" id="customers">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Adres</th>
                        <th scope="col">Website</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($suppliers)
                        @foreach ($suppliers as $supplier)
                            <tr class="clickable" onclick="window.location.href = '{{ route('suppliers.show', $supplier) }}'">
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->street }} {{ $supplier->number }}, {{ $supplier->zipcode }}  {{ $supplier->city }}</td>
                                <td>
                                    <a href="{{ $supplier->website }}" target="_blank">{{ parse_url($supplier->website)['host'] }}</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Er zijn geen leveranciers gevonden</td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                <div class="d-flex">
                    <div class="mx-auto">
                        {{ $suppliers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
