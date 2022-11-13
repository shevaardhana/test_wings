@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-1"></div>

    <div class="col-md-10 d-flex justify-content-center mt-5">

        <div class="row">
            <div class="card col-md-12" style="width: 500px">
                <div class="card-title pt-2 mb-5 mx-auto">
                    <a class="btn btn-primary mx-5 btn1" aria-current="page" href="#">1</a>
                    <a class="btn btn-outline-secondary mx-5 btn1" href="#">2</a>
                    <a class="btn btn-outline-secondary mx-5 btn1" href="#">3</a>
                </div>

                <div class="row" id="product">
                </div>

                <div class="card-body text-center">
                    <button class="btn btn-primary btn2 px-5" onclick="checkout()">CHECKOUT</button>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-1"></div>
</div>

@push('after-style')
    <style>
        .btn1{
            border-radius: 100px;
            transition: all 0.3s ease 0s;
        }

        .btn2{
            border-radius: 15px;
        }
    </style>
@endpush

@push('after-script')
    <script>

        $(document).ready(function(){
            localStorage.setItem('user', '{{$user->user}}');

            $.ajax({
                url: 'http://127.0.0.1:8000/api/products',
                dataType: 'json',
                success: function(data) {
                    for (var i=0; i<data.products.length; i++) {
                        var row = $(`
                            <div class="col-md-3 d-flex justify-content-center mt-2"><img src="https://dummyimage.com/75x75/0daaff/0daaff.jpg" /></div>
                            <div class="col-md-3 my-auto"><a href="/product/${data.products[i].id}">${data.products[i].product_name}</a></div>
                            <div class="col-md-3 my-auto">${data.products[i].price}</div>
                            <div class="col-md-3 my-auto">
                                <button class="btn btn-primary btn2 px-4" data-id="${data.products[i].id}" data-name="${data.products[i].product_name}" data-code="${data.products[i].product_code}" data-price="${data.products[i].price}" data-unit="${data.products[i].unit}" data-currency="${data.products[i].currency}" onclick="addtolocalstorage(this)">Buy</button>
                            </div>`);

                        $('#product').append(row);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Error: ' + textStatus + ' - ' + errorThrown);
                }
            });
        });

        const cartItems = [];

        function addtolocalstorage(data){
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

        }

        function checkout(){
            localStorage.setItem('cartItems', JSON.stringify(cartItems));

            window.location.href = "/checkout";
        }

    </script>
@endpush
