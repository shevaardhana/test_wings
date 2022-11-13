@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 d-flex justify-content-center mt-5">

        <div class="row">
            <div class="card col-md-12" style="width: 500px">
                <div class="card-title pt-2 mb-5 mx-auto">
                    <a class="btn btn-outline-secondary mx-5 btn1" href="#">1</a>
                    <a class="btn btn-primary mx-5 btn1" aria-current="page" href="#">2</a>
                    <button class="btn btn-outline-secondary mx-5 btn1">3</button>
                </div>

                <div class="row" id="product">
                </div>

                <div class="card-body text-center">
                    <h4 id="totalPrice"></h4>

                    <button class="btn btn-primary btn2 px-5" onclick="confirm()">Confirm</button>
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

        input[type='number']{
            width: 40px;
        }
    </style>
@endpush

@push('after-script')
    <script>

        var cartItems = JSON.parse(localStorage.getItem('cartItems'))
        var user = localStorage.getItem('user');

        function amount(item){
            return item.price * item.quantity;
        }

        function sum(prev, next){
            return prev + next;
        }

        var total = cartItems.map(amount).reduce(sum);

        document.getElementById("totalPrice").innerHTML = 'Total: Rp. ' + cartItems.map(amount).reduce(sum);

        for (var i=0; i<cartItems.length; i++) {

            var row = $(`
                <div class="col-md-4 d-flex justify-content-center my-3"><img src="https://dummyimage.com/75x75/0daaff/0daaff.jpg" /></div>
                <div class="col-md-8 my-auto">
                    <h4>${cartItems[i].name}</h4>
                    <input type="number" id="${cartItems[i].id}" name="qty" value="${cartItems[i].quantity}" min="1"
                    data-id="${cartItems[i].id}" data-name="${cartItems[i].name}"
                    data-code="${cartItems[i].code}" data-price="${cartItems[i].price}"
                    data-unit="${cartItems[i].unit}" data-currency="${cartItems[i].currency}"
                    data-qty="${cartItems[i].quantity}"
                    onclick="updateQty(this)"> ${cartItems[i].unit}
                    <h6 id="subtotal${cartItems[i].id}">Subtotal: ${cartItems[i].price * cartItems[i].quantity}</h6>
                </div>
            `);
            $('#product').append(row);
        }

        function updateQty(data){
            var cartItems = localStorage.getItem('cartItems');
            var itemsparsed = JSON.parse(cartItems)

            const x = $(data).data('id') - 1
            itemsparsed.splice(x, 1);

            var qty = $(data).data('qty')
            qty += 1

            var item = {
                "id": $(data).data('id'),
                "name": $(data).data('name'),
                "code": $(data).data('code'),
                "price": $(data).data('price'),
                "unit": $(data).data('unit'),
                "quantity": qty,
                "currency": $(data).data('currency')
            }

            itemsparsed.push(item);
            itemsparsed.reverse();
            localStorage.setItem('cartItems', JSON.stringify(itemsparsed))

            document.getElementById(`subtotal${$(data).data('id')}`).innerHTML = 'Subtotal: ' + $(data).data('price') * qty;

            location.reload()
        }

        function confirm(){
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1:8000/api/transaction",
                dataType: "json",
                data: {
                    user: user,
                    total: total,
                    details: cartItems,
                }
            })

            window.location.href = "/listing";
        }
</script>
@endpush
