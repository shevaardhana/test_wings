<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = TransactionHeader::with('TransactionDetail.Products')
                        ->get();

        return view('pages.listing')->with([
            'transactions' =>$transactions
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $idHeader = TransactionHeader::max('id');

        $data['document_code'] = 'TRX';
        $data['document_number'] = str_pad($idHeader + 1, 3, '0', STR_PAD_LEFT);
        $data['user'] = $request->user;
        $data['date'] = Carbon::now()->format('Y-m-d');
        $data['total'] = $request->total;

        $header = TransactionHeader::create($data);
        $details = $request->details;

        foreach ($details as $key => $value) {

            $OrderDetails[] = new TransactionDetail([
                'document_code' => $header->document_code,
                'document_number' => $header->document_number,
                'product_code' => $value['code'],
                'price' => $value['price'],
                'quantity' => $value['quantity'],
                'unit' => $value['unit'],
                'currency' => $value['currency'],
                'sub_total' => $value['quantity'] * $value['price'],
            ]);
        }

        $header->TransactionDetail()->saveMany($OrderDetails);

        return response()->json([
            'message' => 'Successfully store data'
        ], 200);
    }
}
