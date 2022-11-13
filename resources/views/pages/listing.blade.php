@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-1"></div>

    <div class="col-md-10 d-flex justify-content-center mt-5">

        <div class="row">
            <div class="card col-md-12" style="width: 700px">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Transaction</th>
                                <th scope="col">User</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                                <th scope="col">Items</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->document_code }} - {{ $transaction->document_number }}</td>
                                    <td>{{ $transaction->user }}</td>
                                    <td>Rp. {{ $transaction->total }}</td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($transaction->TransactionDetail as $detail)
                                                <li>{{ $detail->products->product_name }} x {{ $detail->quantity }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-1"></div>
</div>
