@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-1"></div>

    <div class="col-md-10 d-flex justify-content-center mt-5">
        <div class="card col-md-12" style="width: 500px">
            <div class="card-title">
                <h4 class="text-center mt-3">Product Detail</h4>
            </div>

            <div class="card-body">
                <div class="row">

                    <div class="col-md-4 d-flex justify-content-center">
                        <img src="https://dummyimage.com/100x100/0daaff/0daaff.jpg" />
                    </div>

                    <div class="col-md-8">
                        <h4>{{ $product->product_name }}</h4>
                        <h5>{{ $product->currency }}{{ $product->price }}</h5>

                        <p>Dimension: {{ $product->dimension }}</p>
                        <p>Price Unit: {{ $product->unit }}</p>

                        <div class="text-end">
                            <button class="btn btn-primary btn2 px-5" data-id="{{ $product->id }}" data-name="{{ $product->product_name }}" data-code="{{ $product->product_code }}" data-price="{{ $product->price }}" data-unit="{{ $product->unit }}" data-currency="{{ $product->currency }}" onclick="buy(this)">Buy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-1"></div>
</div>

@push('after-style')
    <style>
        .btn2{
            border-radius: 15px;
        }
    </style>
@endpush

@push('after-script')
    <script>
        const cartItems = [];

        function buy(data){
            // console.log($(data).data('name'))

            var item = {
                "id": $(data).data('id'),
                "name": $(data).data('name'),
                "code": $(data).data('code'),
                "price": $(data).data('price'),
                "unit": $(data).data('unit'),
                "quantity": 1,
                "currency": $(data).data('currency')
            }

            cartItems.push(item);

            localStorage.setItem('cartItems', JSON.stringify(cartItems));

            window.location.href = "/checkout";
        }
    </script>
@endpush
