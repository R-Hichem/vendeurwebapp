<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderProduct;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInfoMail;

class PlatformController extends Controller
{
    public function index(){
        $products = Product::paginate(9);
        return view('platforme.PlatformeHomePage', [
            'products' => $products,
        ]);
    }

    public function show($id){
        if (Product::find($id)) {
           return view('platforme.ProductDetails',[
               'product' => Product::find($id),
           ]);
        }
        abort(404);
    }

    public function addToCart(Request $request){
        $product = Product::find($request->product_id);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->unit_price,
            'quantity' => $request->quantity,
            'associatedModel' => $product
        ]); 
        return redirect()->back()->with('status', 'Produit ajouté au pannier !');
        }

    public function showCart(Request $request){
            return view('platforme.Cart', [
            'products' => \Cart::getContent(),
            'total' => \Cart::getTotal(),
            'isEmpty' => \Cart::isEmpty()
        ]);
    }

    
    public function checkoutIndex(Request $request){
        if (\Cart::isEmpty()) {
            abort(403);
        }
            return view('platforme.CheckoutIndex');
    }


    public function checkoutFinalize(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'email_confirmation' => 'required',
            'adresse' => 'required',
        ]);
        $order = new Order();
        $order->code = $random = \Str::random(20);
        $order->ammount = \Cart::getTotal();
        $order->payed = false;
        $order->shipped = false;
        $order->client_name = $request->name;
        $order->email = $request->email;
        $order->adresse = $request->adresse;
        $order->created_at = now();
        $order->updated_at = now();
        $order->save();

        foreach (\Cart::getContent() as $product) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->associatedModel->id;
            $orderProduct->quantity = $product->quantity;
            $orderProduct->created_at = now();
            $orderProduct->updated_at = now();
            $orderProduct->save();
        }

        \Cart::clear();

        Mail::to($order->email)->send(new OrderInfoMail($order)); 

        return view('platforme.CheckoutFinalized', [
            'code' => $order->code,
            'email' => $order->email,
        ]);
    }

    public function orderStatusIndex(Request $request){
            return view('platforme.OrderStatusIndex');
    }
    public function orderStatus(Request $request){
        $request->validate([
            'code' => 'required|exists:orders,code',
        ]);

        $order = Order::where('code', $request->code)->first();
        $order_products = $order->hasMany('App\OrderProduct')->get();
            return view('platforme.OrderStatus', [
                'order' => $order,
                'order_products' => $order_products,
            ]);
       
    }
}