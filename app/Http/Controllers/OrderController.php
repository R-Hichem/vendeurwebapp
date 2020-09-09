<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Http\Resources\TransactionResource;
use App\Order;
use App\Transaction;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Events\TransactionSuccess;
use App\TransactionDetails;

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

    public function addWithJsonDetails(Request $request)
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

        $trasanctionDetails = new TransactionDetails();
        $trasanctionDetails->transaction_id = $transaction->id;
        $trasanctionDetails->details = $request->details;
        $trasanctionDetails->save();

        
        return response(['message' => 'success'], 200);
    }

    public function addFromOtherServer(Request $request)
    {
        // event(new TransactionSuccess('stuff works :D ', 10));
        // return "works so far";
        $order = Order::find(request('order_id'));
        $order->payed = true;
        $order->updated_at = now();
        $order->save();
       

        $transaction = new Transaction();
        $transaction->user_id = request('vendeur_id');
        $transaction->order_id = $order->id;
        $transaction->created_at = now();
        $transaction->updated_at = now();
        $transaction->save();

        $trasanctionDetails = new TransactionDetails();
        $trasanctionDetails->transaction_id = $transaction->id;
        $json = [
            'type' => 'mobile_Qr',
            'details' => [
                'client_os' => 'android',
                'vendeur_od' => 'android'
            ]
        ];
        $trasanctionDetails->details = json_encode($json);
        $trasanctionDetails->save();

        event(new TransactionSuccess('stuff works :D ', request('order_id')));
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
                'qr' => "data:image/png;base64," . base64_encode(QrCode::format('png')->size(500)->generate('{"to" : "Compa Ny", "order_id" : '.$request->order_id.', "vendeur_id" : '.$request->user()->id.', "account_code": "R4ND0MC0D3", "ammount" : ' . $order->ammount . '}')),
            ],
        ];

        return response($response, 200);
    }

    public function informations(Request $request){
        return [
            'total_orders' => Order::all()->count(),
            'total_payed' => Order::where('payed', 1)->count(),
            'total_shipped' => Order::where('shipped', 1)->count(),
            'total_non_payed' => Order::where('payed', 0)->count(),
            'total_non_shipped' => Order::where('shipped', 0)->count(),
            'total_transactions' => Transaction::where('user_id', request()->user()->id)->count()
        ];
    }
}