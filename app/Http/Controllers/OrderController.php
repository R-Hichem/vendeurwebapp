<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Http\Resources\TransactionResource;
use App\Order;
use App\Transaction;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class OrderController extends Controller
{
    public function list(Request $request)
    {
        $response = [
            'data' => OrderResource::collection(Order::orderByDesc('id')->get()),
        ];

        return response($response, 200);
    }

    public function show(Request $request)
    {
        $response = [
            'data' => new OrderResource(Order::find($request->order_id)),
        ];

        return response($response, 200);
    }

    public function history(Request $request)
    {

        $history = Transaction::where('user_id', request()->user()->id)->get();

        $response = [
            'data' => TransactionResource::collection($history)
        ];

        return response($response, 200);
    }

    public function add(Request $request)
    {
        $order = Order::find(request('order_id'));
        $order->payed = true;
        $order->updated_at = now();
        $order->save();

        $transaction = new Transaction();

        $transaction->user_id = request()->user()->id;
        $transaction->order_id = $order->id;
        $transaction->created_at = now();
        $transaction->updated_at = now();
        $transaction->save();


        return response(['message' => 'success'], 200);
    }

    public function issueQR(Request $request)
    {
        $order = Order::find($request->order_id);

        if ($order->payed == true) {
            $response = [
                'message' => 'Order Has Already Been Payed',
            ];
            return response($response, 422);
        }



        $response = [
            'data' => [
                'qr' => "data:image/png;base64," . base64_encode(QrCode::format('png')->size(500)->generate('{"to" : "Compa Ny", "account_code": "R4ND0MC0D3", "ammount" : ' . $order->ammount . '}')),
            ],
        ];

        return response($response, 200);
    }
}