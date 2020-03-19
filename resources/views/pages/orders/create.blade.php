@extends('layouts.app', ['title' => __('Bestelling Aanmaken')])

@section('content')
    <div class="container">
        <div class="col-8 offset-2">
            <form method="POST" action="{{ route('orders.store') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bestelling Aanmaken</h4>
                        <div class="form-group">
                            <label for="customer_id">Naam</label>
                            <select class="form-control selectpicker" id="customer_id" name="customer_id" data-live-search="true" onchange="customerSelected(this.value)" title="Kies een klant" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @foreach($customer->customer_addresses as $address)
                                        @push('addresses')
                                            <option class="customer_address" id="address{{ $address->id }}" value="{{ $address->id }}" data-customer-id="{{ $address->customer_id }}" data-street="{{ $address->street }}" data-number="{{ $address->number }}" data-city="{{ $address->city }}" data-state="{{ $address->state }}" data-country="{{ $address->country }}" data-zipcode="{{ $address->zipcode }}" hidden>{{ $address->street }} {{ $address->number }}</option>
                                        @endpush
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="customer_address">Adres</label>
                            <select class="form-control selectpicker" id="customer_address" name="customer_address_id" data-live-search="true" onchange="addressSelected(this.value)" title="Kies een adres" disabled required>
                                @stack('addresses')
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-5">
                                <label for="addressCity">Stad</label>
                                <input type="text" class="form-control" id="addressCity" disabled>
                            </div>
                            <div class="form-group col-4">
                                <label for="addressState">Provincie</label>
                                <input type="text" class="form-control" id="addressState" disabled>
                            </div>
                            <div class="form-group col-3">
                                <label for="addressZip">Postcode</label>
                                <input type="text" class="form-control" id="addressZip" disabled>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-info" value="Aanmaken"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function customerSelected(customerId) {
            const select = $('#customer_address');
            select.selectpicker('val', null);

            $('.customer_address').each(function () {
                const option = $(this);
                option.attr('hidden', option.data('customer-id') != customerId);
            });

            select.prop('disabled', false);
            select.selectpicker('refresh');
            addressSelected('0');
        }

        function addressSelected(addressId) {
            const address = $('#address' + addressId);

            $('#addressCity').val(address.data('city'));
            $('#addressState').val(address.data('state'));
            $('#addressZip').val(address.data('zipcode'));
        }
    </script>
@endpush
